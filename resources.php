<?php $pageTitle = 'Resources'; include 'header.php'; ?>

<main class="resources-page">
    <!-- Hero Section -->
    <section class="resources-hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Resources</h1>
            <p class="tagline">Disaster Preparedness Guides & Tips</p>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="search-section">
        <div class="container">
            <input type="text" id="search-input" placeholder="Search resources..." class="search-bar">
        </div>
    </section>

    <!-- Resources Accordion Cards -->
    <section class="resources-section">
        <div class="container">
            <div class="resources-grid" id="resources-grid">
                <!-- Card 1 -->
                <div class="resource-card">
                    <div class="card-header" onclick="toggleCard(this)">
                        <h3>Emergency Kit Checklist</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="card-body">
                        <p>Essential items to include in your emergency kit for disasters:</p>
                        <ul>
                            <li>Water (1 gallon per person per day for at least 3 days)</li>
                            <li>Non-perishable food (3-day supply)</li>
                            <li>First aid kit</li>
                            <li>Flashlight and extra batteries</li>
                            <li>Whistle to signal for help</li>
                            <li>Dust mask</li>
                            <li>Local maps</li>
                            <li>Manual can opener</li>
                            <li>Cell phone with chargers and backup battery</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="resource-card">
                    <div class="card-header" onclick="toggleCard(this)">
                        <h3>Evacuation Plans</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="card-body">
                        <p>How to create and practice an evacuation plan for your family:</p>
                        <ul>
                            <li>Identify multiple escape routes from your home</li>
                            <li>Designate a family meeting place outside</li>
                            <li>Practice the plan at least twice a year</li>
                            <li>Keep important documents in a waterproof container</li>
                            <li>Know how to shut off utilities (gas, water, electricity)</li>
                            <li>Plan for pets and special needs family members</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="resource-card">
                    <div class="card-header" onclick="toggleCard(this)">
                        <h3>First Aid Guide</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="card-body">
                        <p>Basic first aid techniques for common injuries during emergencies:</p>
                        <ul>
                            <li>Stop bleeding with direct pressure and elevation</li>
                            <li>Treat burns with cool running water for 10-15 minutes</li>
                            <li>CPR basics: 30 compressions, 2 breaths</li>
                            <li>Splint suspected fractures to prevent movement</li>
                            <li>Treat shock: keep person warm and lying down with legs elevated</li>
                            <li>Recognize signs of heart attack and stroke</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="resource-card">
                    <div class="card-header" onclick="toggleCard(this)">
                        <h3>Flood Safety Tips</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="card-body">
                        <p>Important safety measures to take before, during, and after a flood:</p>
                        <ul>
                            <li>Avoid walking or driving through flood waters (6 inches can knock you down)</li>
                            <li>Move to higher ground immediately</li>
                            <li>Turn off electricity at the main breaker if flooding is imminent</li>
                            <li>Stay informed through radio or phone alerts</li>
                            <li>Clean and disinfect everything that got wet</li>
                            <li>Be aware of mold growth after flooding</li>
                        </ul>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="resource-card">
                    <div class="card-header" onclick="toggleCard(this)">
                        <h3>Cyclone Preparedness</h3>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="card-body">
                        <p>Steps to stay safe during cyclones and strong winds:</p>
                        <ul>
                            <li>Secure outdoor objects that could become projectiles</li>
                            <li>Board up windows and glass doors</li>
                            <li>Stock up on supplies for at least 3 days</li>
                            <li>Have an evacuation plan ready if in a low-lying area</li>
                            <li>Stay indoors in the strongest room away from windows</li>
                            <li>Listen to official warnings and follow evacuation orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Accordion Toggle Function
function toggleCard(header) {
    const card = header.parentElement;
    const body = header.nextElementSibling;
    const icon = header.querySelector('.toggle-icon');

    card.classList.toggle('active');
    
    if (card.classList.contains('active')) {
        body.style.maxHeight = body.scrollHeight + "px";
        icon.textContent = '−';
    } else {
        body.style.maxHeight = '0';
        icon.textContent = '+';
    }
}

// Search Functionality
document.getElementById('search-input').addEventListener('input', function() {
    let filter = this.value.toLowerCase();
    let cards = document.querySelectorAll('.resource-card');

    cards.forEach(card => {
        let title = card.querySelector('h3').textContent.toLowerCase();
        let text = card.textContent.toLowerCase();
        if (title.includes(filter) || text.includes(filter)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>

<?php include 'footer.php'; ?>