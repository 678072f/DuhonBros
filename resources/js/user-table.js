function showAllUsers() {
    document.getElementById('all').style.display = 'block';
    document.getElementById('active').style.display = 'none';
    document.getElementById('inactive').style.display = 'none';
}

function showActiveUsers() {
    document.getElementById('all').style.display = 'none';
    document.getElementById('active').style.display = 'block';
    document.getElementById('inactive').style.display = 'none';
}

function showInactiveUsers() {
    document.getElementById('all').style.display = 'none';
    document.getElementById('active').style.display = 'none';
    document.getElementById('inactive').style.display = 'block';
}

