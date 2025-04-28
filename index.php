<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aqua Sense - Healthy Water, Healthy Fish</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom color and gradient */
    @layer base {
      :root {
        --logo-color: #0277BD; /* Replace with your logo color */
        --logo-gradient: linear-gradient(to right, #0277BD, #039BE5); /* Gradient of logo color */
      }
    }
  </style>
</head>
<body class="bg-blue-50 text-gray-900">

<!-- Header Section with Contact and Social Links -->
<header class="bg-[var(--logo-gradient)] text-lightblue py-6"></header>
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo and Navigation -->
        <div class="logo flex items-center">
            <img src="AQUASENSE LOGO.png" alt="Aqua Sense Logo" class="w-16 h-16">
            <div class="ml-4">
                <h1 class="text-3xl font-bold">Aqua Sense</h1>
                <p class="text-sm">Healthy Water, Healthy Fish</p>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav>
            <ul class="flex space-x-6">
                <li><a href="#home" class="hover:text-blue-800 text-lightblue">Home</a></li>
                <li><a href="#about" class="hover:text-blue-800 text-lightblue">About</a></li>
                <li><a href="#services" class="hover:text-blue-800 text-lightblue">Services</a></li>
                <li><a href="#impact" class="hover:text-blue-800 text-lightblue">Impact</a></li>
                <li><a href="#pricing" class="hover:text-blue-800 text-lightblue">Pricing</a></li>
                <li><a href="#contact" class="hover:text-blue-800 text-lightblue">Contact</a></li>
            </ul>
        </nav>

        <!-- Signup and Login Buttons -->
        <div class="flex space-x-4">
            <?php if (isset($_SESSION['user_name'])): ?>
                <!-- User is logged in -->
                <div class="flex items-center space-x-2">
                    <span class="text-white font-semibold"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    <a href="logout.php" class="bg-red-500 text-white px-3 py-2 rounded-lg text-sm font-semibold hover:bg-red-600 transition duration-300">Logout</a>
                </div>
            <?php else: ?>
                <!-- User is not logged in -->
                <a href="register.html" class="bg-yellow-400 text-blue-900 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-yellow-500 transition duration-300">Sign Up</a>
                <a href="login.html" class="bg-blue-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition duration-300">Login</a>
            <?php endif; ?>
        
            <div class="flex space-x-3">
                <a href="https://www.facebook.com/aquasense" class="hover:text-blue-800 text-lightblue"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com/aquasense" class="hover:text-blue-800 text-lightblue"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/aquasense" class="hover:text-blue-800 text-lightblue"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.instagram.com/aquasense" class="hover:text-blue-800 text-lightblue"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        </div>
    </div>
</header>

  <!-- Hero Section -->
  <section id="home" class="bg-gradient-to-r from-[#0277BD] to-[#039BE5] text-white py-32">
    <div class="container mx-auto text-center">
      <h2 class="text-5xl font-bold mb-4">Revolutionizing Sustainable Aquaculture</h2>
      <p class="text-xl mb-8">Helping fish farmers achieve optimal growth and sustainability using real-time data and intelligent insights.</p>
      <a href="#contact" class="bg-yellow-400 text-blue-900 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-500 transition duration-300">Get In Touch</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-16 bg-white text-center">
    <div class="container mx-auto">
      <h2 class="text-4xl font-semibold mb-6 text-[var(--logo-color)]">About Aqua Sense</h2>
      <p class="text-lg max-w-3xl mx-auto">
        Aqua Sense is committed to transforming aquaculture by providing farmers with cutting-edge tools for managing water quality, stocking density, and feed optimization. Our goal is to make sustainable fish farming accessible to all.
      </p>
    </div>
  </section>

  <!-- Farmer Profile Section with Pond Management -->
  <section id="farmer-profile" class="py-16 bg-blue-50">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-semibold mb-6 text-[var(--logo-color)]">Farmer Profile</h2>
      <p class="text-lg max-w-3xl mx-auto mb-8">
        Manage your ponds, monitor water quality, and optimize your fish farming process through Aqua Sense. Add your pond details and get personalized recommendations.
      </p>
      
      <!-- Pond Management Form -->
      <div class="mb-8">
        <h3 class="text-2xl font-semibold mb-4 text-[var(--logo-color)]">Add Your Pond</h3>
        <form class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
          <input type="text" name="location" placeholder="Pond Location" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
          <input type="number" name="height" placeholder="Pond Height (in meters)" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
          <input type="number" name="width" placeholder="Pond Width (in meters)" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
          <input type="number" name="depth" placeholder="Pond Depth (in meters)" class="w-full p-4 rounded-lg mb-4 border-2 border-gray-300" required>
          <button type="submit" class="w-full bg-[var(--logo-color)] text-white py-3 rounded-lg hover:bg-blue-800 transition duration-300">Add Pond</button>
        </form>
      </div>

      <!-- Pond Overview Section -->
      <div class="mb-8">
        <h3 class="text-2xl font-semibold mb-4 text-[var(--logo-color)]">Your Ponds</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Pond 1 -->
          <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:bg-[var(--logo-color)] transition duration-300 cursor-pointer">
            <h4 class="text-lg font-semibold text-[var(--logo-color)]">Pond 1</h4>
            <p class="text-blue-600">Location: Pond 1</p>
            <button class="mt-4 bg-[var(--logo-color)] text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-300">Select</button>
          </div>
          <!-- Pond 2 -->
          <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:bg-[var(--logo-color)] transition duration-300 cursor-pointer">
            <h4 class="text-lg font-semibold text-[var(--logo-color)]">Pond 2</h4>
            <p class="text-blue-600">Location: Pond 2</p>
            <button class="mt-4 bg-[var(--logo-color)] text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-300">Select</button>
          </div>
          <!-- Pond 3 -->
          <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:bg-[var(--logo-color)] transition duration-300 cursor-pointer">
            <h4 class="text-lg font-semibold text-[var(--logo-color)]">Pond 3</h4>
            <p class="text-blue-600">Location: Pond 3</p>
            <button class="mt-4 bg-[var(--logo-color)] text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-300">Select</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Recommendation Sections with Pond Details -->
  <section id="recommendations" class="py-16 bg-white">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-semibold mb-6 text-[var(--logo-color)]">Personalized Recommendations</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Fish Recommendation Card -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 cursor-pointer">
          <h3 class="text-2xl font-semibold text-[var(--logo-color)]">Fish Recommendation</h3>
          <p class="mt-4 text-blue-600">Select a pond and receive species recommendations based on water quality and environment.</p>
          <select id="pond-select" class="mt-4 p-2 rounded-lg border-2 border-gray-300">
            <option value="1">Pond 1</option>
            <option value="2">Pond 2</option>
            <option value="3">Pond 3</option>
          </select>
          <button onclick="showPondOptions()" class="mt-4 bg-[var(--logo-color)] text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-300">Get Recommendation</button>
        </div>
        <!-- Fish Stocking Card -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 cursor-pointer">
          <h3 class="text-2xl font-semibold text-[var(--logo-color)]">Fish Stocking</h3>
          <p class="mt-4 text-blue-600">Learn the ideal stocking density for your selected pond.</p>
          <select id="pond-select" class="mt-4 p-2 rounded-lg border-2 border-gray-300">
            <option value="1">Pond 1</option>
            <option value="2">Pond 2</option>
            <option value="3">Pond 3</option>
          </select>
          <button onclick="showPondOptions()" class="mt-4 bg-[var(--logo-color)] text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-300">Get Stocking Info</button>
        </div>
        <!-- Food Recommendation Card -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 cursor-pointer">
          <h3 class="text-2xl font-semibold text-[var(--logo-color)]">Food Recommendation</h3>
          <p class="mt-4 text-blue-600">Select a pond and get personalized feed schedules based on fish size and environment.</p>
          <select id="pond-select" class="mt-4 p-2 rounded-lg border-2 border-gray-300">
            <option value="1">Pond 1</option>
            <option value="2">Pond 2</option>
            <option value="3">Pond 3</option>
          </select>
          <button onclick="showPondOptions()" class="mt-4 bg-[var(--logo-color)] text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-300">Get Food Recommendation</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="bg-[var(--logo-gradient)] text-[var(--logo-color)] py-8"></footer>
    <div class="container mx-auto text-center">
      <div class="mb-6">
        <h3 class="text-2xl font-semibold">Aqua Sense</h3>
        <p class="text-sm">Your trusted partner in sustainable aquaculture.</p>
      </div>
      <div class="flex justify-center space-x-8 mb-6">
        <a href="#about" class="hover:text-yellow-400">About Us</a>
        <a href="#services" class="hover:text-yellow-400">Services</a>
        <a href="#contact" class="hover:text-yellow-400">Contact</a>
        <a href="/privacy-policy" class="hover:text-yellow-400">Privacy Policy</a>
        <a href="/terms" class="hover:text-yellow-400">Terms & Conditions</a>
      </div>
      <div class="mb-6">
        <h4 class="text-xl font-semibold">Subscribe to Our Newsletter</h4>
        <form action="/subscribe" method="POST" class="flex justify-center space-x-4">
          <input type="email" name="email" placeholder="Enter your email" class="p-3 rounded-lg text-black" required>
          <button type="submit" class="bg-yellow-400 text-blue-900 py-3 px-6 rounded-lg hover:bg-yellow-500 transition duration-300">Subscribe</button>
        </form>
      </div>
      <div class="flex justify-center space-x-6">
        <a href="https://www.facebook.com/aquasense" class="hover:text-yellow-400"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/aquasense" class="hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/aquasense" class="hover:text-yellow-400"><i class="fab fa-linkedin"></i></a>
        <a href="https://www.instagram.com/aquasense" class="hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
      </div>
      <p class="mt-6 text-sm">&copy; 2025 Aqua Sense. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
