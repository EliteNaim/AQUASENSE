<?php
session_start();
require_once 'db.php'; // database connection

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

// Handle delete request
if (isset($_GET['delete'])) {
    $pond_id_to_delete = intval($_GET['delete']);
    $farmer_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("DELETE FROM Pond WHERE pond_id = ? AND farmer_id = ?");
    $stmt->bind_param('ii', $pond_id_to_delete, $farmer_id);
    $stmt->execute();
}

// Handle form submission (add or update pond)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = trim($_POST['location']);
    $height = floatval($_POST['height']);
    $width = floatval($_POST['width']);
    $depth = floatval($_POST['depth']);
    $farmer_id = $_SESSION['user_id'];

    if ($location && $height > 0 && $width > 0 && $depth > 0) {
        if (!empty($_POST['pond_id'])) {
            // Update existing pond
            $pond_id = intval($_POST['pond_id']);
            $stmt = $conn->prepare("UPDATE Pond SET height=?, width=?, depth=?, location=? WHERE pond_id=? AND farmer_id=?");
            $stmt->bind_param('dddsii', $height, $width, $depth, $location, $pond_id, $farmer_id);

            if ($stmt->execute()) {
                $success_message = "✅ Pond updated successfully!";
            } else {
                $error_message = "❌ Update error: " . $stmt->error;
            }
        } else {
            // Insert new pond
            $stmt = $conn->prepare("INSERT INTO Pond (height, width, depth, location, farmer_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('dddsi', $height, $width, $depth, $location, $farmer_id);

            if ($stmt->execute()) {
                $success_message = "✅ Pond added successfully!";
            } else {
                $error_message = "❌ Insert error: " . $stmt->error;
            }
        }
    } else {
        $error_message = "❌ All fields must be filled with valid values.";
    }
}

// Fetch all ponds
$ponds = [];
$farmer_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT pond_id, height, width, depth, location FROM Pond WHERE farmer_id = ?");
$stmt->bind_param('i', $farmer_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $ponds[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Pond - Aqua Sense</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 text-gray-900">

<!-- Navigation Bar -->
<div class="bg-gradient-to-r from-[#0277BD] to-[#039BE5] py-6">
  <div class="container mx-auto flex justify-between items-center px-6">
    <div class="text-white text-2xl font-bold">Aqua Sense</div>
    <div class="flex space-x-4">
      <a href="index.php" class="text-white hover:text-yellow-300">Home</a>
      <a href="logout.php" class="text-white hover:text-yellow-300">Logout</a>
    </div>
  </div>
</div>

<!-- Pond Form -->
<section class="py-16">
  <div class="container mx-auto text-center">
    <h2 class="text-4xl font-semibold mb-6 text-[#0277BD]">Add or Edit Your Pond</h2>

    <?php if (isset($success_message)): ?>
      <div class="bg-green-100 text-green-700 p-4 mb-6 rounded-lg max-w-md mx-auto">
        <?php echo $success_message; ?>
      </div>
    <?php elseif (isset($error_message)): ?>
      <div class="bg-red-100 text-red-700 p-4 mb-6 rounded-lg max-w-md mx-auto">
        <?php echo $error_message; ?>
      </div>
    <?php endif; ?>

    <form method="POST" id="pond-form" class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
      <input type="hidden" name="pond_id" id="pond_id">
      <input type="text" name="location" id="location" placeholder="Pond Location" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
      <input type="number" step="0.01" name="height" id="height" placeholder="Height (in meters)" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
      <input type="number" step="0.01" name="width" id="width" placeholder="Width (in meters)" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
      <input type="number" step="0.01" name="depth" id="depth" placeholder="Depth (in meters)" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
      <button type="submit" id="submit-button" class="w-full bg-[#0277BD] text-white py-3 rounded-lg hover:bg-blue-800 transition duration-300">Add Pond</button>
    </form>
  </div>
</section>

<!-- List Existing Ponds -->
<?php if (count($ponds) > 0): ?>
<section class="py-16 bg-white">
  <div class="container mx-auto">
    <h2 class="text-3xl font-semibold mb-8 text-center text-[#0277BD]">Your Existing Ponds</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-blue-50 rounded-lg shadow-md">
        <thead class="bg-[#0277BD] text-white">
          <tr>
            <th class="py-3 px-6">Location</th>
            <th class="py-3 px-6">Height (m)</th>
            <th class="py-3 px-6">Width (m)</th>
            <th class="py-3 px-6">Depth (m)</th>
            <th class="py-3 px-6">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ponds as $pond): ?>
          <tr class="border-b border-gray-200 text-center">
            <td class="py-4 px-6"><?php echo htmlspecialchars($pond['location']); ?></td>
            <td class="py-4 px-6"><?php echo htmlspecialchars($pond['height']); ?></td>
            <td class="py-4 px-6"><?php echo htmlspecialchars($pond['width']); ?></td>
            <td class="py-4 px-6"><?php echo htmlspecialchars($pond['depth']); ?></td>
            <td class="py-4 px-6 space-x-2">
              <button onclick="editPond('<?php echo $pond['pond_id']; ?>', '<?php echo htmlspecialchars($pond['location']); ?>', '<?php echo $pond['height']; ?>', '<?php echo $pond['width']; ?>', '<?php echo $pond['depth']; ?>')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</button>
              <a href="?delete=<?php echo $pond['pond_id']; ?>" onclick="return confirm('Are you sure you want to delete this pond?');" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- JavaScript for Editing -->
<script>
function editPond(pond_id, location, height, width, depth) {
    document.getElementById('pond_id').value = pond_id;
    document.getElementById('location').value = location;
    document.getElementById('height').value = height;
    document.getElementById('width').value = width;
    document.getElementById('depth').value = depth;
    document.getElementById('submit-button').innerText = 'Update Pond';
}
</script>

</body>
</html>
