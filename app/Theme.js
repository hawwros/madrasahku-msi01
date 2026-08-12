/* =============================================
   MADRASAHKU - theme.js
   ============================================= */

document.addEventListener('DOMContentLoaded', function () {

    // ─── Mobile Menu Toggle ──────────────────────────────
    const btn       = document.getElementById('mobileMenuBtn');
    const menu      = document.getElementById('mobileMenu');
    const menuIcon  = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');

    if (btn && menu) {
        btn.addEventListener('click', function () {
            const isOpen = !menu.classList.contains('hidden');
            menu.classList.toggle('hidden', isOpen);
            menuIcon.classList.toggle('hidden', !isOpen);
            closeIcon.classList.toggle('hidden', isOpen);
        });

        // Close menu when any link clicked
        menu.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                menu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
    }

    // ─── Auto-dismiss flash messages ─────────────────────
    setTimeout(function () {
        document.querySelectorAll('.auto-dismiss').forEach(function (el) {
            el.style.transition = 'opacity 0.5s';
            el.style.opacity = '0';
            setTimeout(function () { el.remove(); }, 500);
        });
    }, 5000);

    // ─── Admin: Confirm delete ────────────────────────────
    document.querySelectorAll('[data-confirm]').forEach(function (el) {
        el.addEventListener('click', function (e) {
            if (!confirm(el.dataset.confirm || 'Yakin ingin menghapus data ini?')) {
                e.preventDefault();
            }
        });
    });

    // ─── Admin: File input preview ────────────────────────
    document.querySelectorAll('input[type="file"][data-preview]').forEach(function (input) {
        input.addEventListener('change', function () {
            const previewEl = document.getElementById(input.dataset.preview);
            if (!previewEl) return;
            const file = input.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) { previewEl.src = e.target.result; previewEl.classList.remove('hidden'); };
                reader.readAsDataURL(file);
            }
        });
    });

    // ─── Admin: Toggle active state ──────────────────────
    document.querySelectorAll('.toggle-status').forEach(function (cb) {
        cb.addEventListener('change', function () {
            const url    = cb.dataset.url;
            const formData = new FormData();
            formData.append('is_aktif', cb.checked ? 1 : 0);
            formData.append(cb.dataset.csrfName, cb.dataset.csrfHash);
            fetch(url, { method: 'POST', body: formData })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (!data.success) { cb.checked = !cb.checked; alert('Gagal mengubah status.'); }
                })
                .catch(function () { cb.checked = !cb.checked; alert('Terjadi kesalahan.'); });
        });
    });

    // ─── Smooth scroll for anchor links ──────────────────
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ─── Navbar: Add shadow on scroll ────────────────────
    const header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', function () {
            header.classList.toggle('shadow-md', window.scrollY > 10);
        });
    }

    // ─── Re-init lucide icons (for dynamically added content) ───
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});