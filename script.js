// Dark Mode Toggle
document.getElementById('theme-toggle').addEventListener('click', () => {
    document.body.classList.toggle('dark');
});

// Join as Helper Button – কাউন্টার বাড়াবে + নতুন প্যারাগ্রাফ যোগ করবে
let count = 1247;
const counter = document.getElementById('counter');
document.getElementById('join-btn').addEventListener('click', () => {
    count += 10;
    counter.textContent = count;

    // DOM Manipulation: নতুন এলিমেন্ট তৈরি
    const newMsg = document.createElement('p');
    newMsg.textContent = 'Thank you! New helper joined!';
    newMsg.style.color = 'green';
    newMsg.style.fontWeight = 'bold';
    document.querySelector('.stats').appendChild(newMsg);
});

// Get Involved Button – লুকানো সেকশন দেখাবে/লুকাবে
document.getElementById('get-involved').addEventListener('click', () => {
    const section = document.getElementById('hidden-section');
    section.style.display = section.style.display === 'none' ? 'block' : 'none';
});
// Donation Button – ক্লিক করলে একটা সুন্দর Alert বা Modal দেখাবে
document.getElementById('donate-btn').addEventListener('click', () => {
    alert('Thank you for wanting to donate! \n\nYou will be redirected to our secure donation page shortly.');
    // চাইলে এখানে আসল donation page-এ রিডিরেক্ট করতে পারিস
    // window.location.href = "donation.php";
});
// View Details Button – alert + ব্যাকগ্রাউন্ড কালার চেঞ্জ
document.getElementById('view-details').addEventListener('click', () => {
    alert('Showing details of current disasters...');
    document.querySelector('.card').style.backgroundColor = '#e3f2fd';
    document.querySelector('.card').style.transition = 'background 0.5s';
});
// Sign Up Button – ক্লিক করলে একটা সুন্দর মেসেজ দেখাবে
document.getElementById('signup-btn').addEventListener('click', () => {
    alert('Thank you for your interest! \nSign Up feature is coming soon.\nStay tuned for updates!');
    // চাইলে পরে sign-up page-এ রিডিরেক্ট করতে পারিস
    // window.location.href = "signup.php";
});
// Dark Mode
document.getElementById('theme-toggle')?.addEventListener('click', () => {
    document.body.classList.toggle('dark');
});

// Modal Functions
function openProfile() {
    document.getElementById('profile-section').style.display = 'block';
}

function closeModal(id) {
    document.getElementById(id).style.display = 'none';
}

// Help Requests
function showRequests() {
    const section = document.getElementById('requests-section');
    section.style.display = section.style.display === 'none' ? 'block' : 'none';
}

function offerHelp() {
    alert('Thank you! Your help offer has been sent to the admin.');
}

// Donate
function donateNow() {
    const amount = prompt('Enter donation amount (BDT):', '500');
    if (amount && !isNaN(amount)) {
        alert(`Thank you! ৳${amount} donated successfully!`);
    }
}

// Volunteer
function joinVolunteer() {
    alert('You have successfully joined the next relief mission!\nLocation: Sylhet Flood Area\nDate: 20 Dec 2025');
}

// Admin Functions
function addUser() {
    const count = document.getElementById('user-count');
    count.textContent = parseInt(count.textContent) + 1;
    alert('New user added successfully!');
}

function approveAll() {
    document.getElementById('pending-count').textContent = '0';
    alert('All help requests approved!');
}

function verifyAll() {
    const total = document.getElementById('total-donation');
    let amount = parseInt(total.textContent.replace(/[^0-9]/g, ''));
    amount += 50000;
    total.textContent = '৳' + amount.toLocaleString();
    alert('All donations verified! +৳50,000 added.');
}

function sendAlert() {
    const msg = prompt('Enter emergency message:');
    if (msg) {
        alert(`Emergency Alert Sent!\n"${msg}"\nAll users notified!`);
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modals = document.getElementsByClassName('modal');
    for (let modal of modals) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
}



function showAlert(msg) {
    alert(msg);
}

function toggleSection(id) {
    const el = document.getElementById(id);
    el.style.display = el.style.display === 'none' ? 'block' : 'none';
}

function addDonation() {
    alert('Thank you! ৳1000 donation recorded!');
}

function showModal() {
    alert('Successfully registered for the next volunteer event!\nLocation: Sylhet\nDate: 25 Dec 2025');
}

function addUser() {
    document.getElementById('user-count').textContent = parseInt(document.getElementById('user-count').textContent) + 1;
    alert('New user added!');
}

function approveRequest() {
    let count = parseInt(document.getElementById('pending-count').textContent);
    if (count > 0) {
        document.getElementById('pending-count').textContent = --count;
        alert('Request approved!');
    }
}

function verifyDonation() {
    let total = parseInt(document.getElementById('total-donation').textContent.replace(/[^0-9]/g, ''));
    total += 15000;
    document.getElementById('total-donation').textContent = total.toLocaleString();
    alert('Donation verified! +৳15,000');
}

function postUpdate() {
    const msg = prompt('Enter disaster update:');
    if (msg) alert(`Update posted to all users:\n"${msg}"`);
}

// Dark/Light Mode Toggle 
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('theme-toggle');

    // লোড হওয়ার সময় আগের থিম চেক করা
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark');
        toggleBtn.textContent = 'Light Mode';
    } else {
        toggleBtn.textContent = 'Dark Mode';
    }


    // ক্লিক করলে থিম চেঞ্জ
    toggleBtn.addEventListener('click', () => {
       document.body.classList.toggle('dark');

       if (document.body.classList.contains('dark')) {
            toggleBtn.textContent = 'Light Mode';
            localStorage.setItem('theme', 'dark');
       } else {
           toggleBtn.textContent = 'Dark Mode';
            localStorage.setItem('theme', 'light');
        }
    });
});

function showSection(section) {
    const detail = document.getElementById('detail-section');
    const content = document.getElementById('section-content');
    const dashboard = document.querySelector('.cards-container');
//
    // dashboard hide and detail show
    dashboard.style.display = 'none';
    detail.style.display = 'block';

    // coneent explanation
    let html = '';

    if (section === 'users') {
        html = `
            <h2>Manage Users</h2>
            <table class="data-table">
                <tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>
                <tr><td>1</td><td>Rahim Khan</td><td>rahim@gmail.com</td><td>User</td><td><button class="btn-small">Edit</button></td></tr>
                <tr><td>2</td><td>Karim Ahmed</td><td>karim@gmail.com</td><td>Volunteer</td><td><button class="btn-small">Edit</button></td></tr>
            </table>
        `;
    }
    else if (section === 'requests') {
        html = `
            <h2>Pending Help Requests</h2>
            <div class="request-card">
                <p><strong>Name:</strong> Ayesha Begum</p>
                <p><strong>Location:</strong> Sylhet Sadar</p>
                <p><strong>Need:</strong> Food & Medicine</p>
                <button class="btn-approve">Approve</button>
                <button class="btn-reject">Reject</button>
            </div>
        `;
    }
    else if (section === 'donations') {
        html = `<h2>Donation History</h2><p>Total: ৳85,420 from 47 donors</p>`;
    }
    else if (section === 'volunteers') {
        html = `<h2>Active Volunteers</h2><p>320+ volunteers ready across Bangladesh</p>`;
    }
    else if (section === 'alerts') {
        html = `
            <h2>Send Disaster Alert</h2>
            <textarea placeholder="Write alert message..."></textarea><br>
            <button class="btn-send">Send Alert</button>
        `;
    }
    else if (section === 'reports') {
        html = `<h2>Monthly Reports</h2><p>8 reports generated this month</p>`;

    content.innerHTML = html;
}

function backToDashboard() {
    document.querySelector('.cards-container').style.display = 'grid';
    document.getElementById('detail-section').style.display = 'none';
}
}
