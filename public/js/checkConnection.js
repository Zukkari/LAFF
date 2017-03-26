function checkConnection() {
    var current = navigator.onLine;

    if (current) {
        document.getElementById('connectionerror').style.display = 'none';
        if (last) {
            document.getElementById('connectionestab').style.display = 'block';
            last = false;
        } else {
            document.getElementById('connectionestab').style.display = 'none';
        }
    } else {
        document.getElementById('connectionerror').style.display = 'block';
        last = true;
    }
}