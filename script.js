jQuery(document).ready(function($) {
  const contatoBtn = document.querySelector('.contato');
  const sidebar = document.getElementById('sidebar');
  const closeBtn = document.querySelector('.close-btn');
  const overlay = document.querySelector('.overlay');

  if (contatoBtn && sidebar && closeBtn && overlay) {
    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('active');
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
    }

    contatoBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);
  }
});