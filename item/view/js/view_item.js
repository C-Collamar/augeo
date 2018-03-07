window.onload = function() {
    var bid_sectToggler = document.getElementById('bid-sect-toggler');
    bid_sectToggler.addEventListener('click', function() {
        this.style.display = 'none';
    });

    document.getElementById('bid-cancel').addEventListener('click', function() {
        bid_sectToggler.style.display = 'initial';
    });
};