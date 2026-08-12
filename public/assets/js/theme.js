document.addEventListener('DOMContentLoaded', function () {
    const anchors = document.querySelectorAll('a[href^="#"]');
    anchors.forEach(anchor => {
        anchor.addEventListener('click', function (event) {
            const targetId = this.getAttribute('href');
            if (targetId.startsWith('#') && targetId.length > 1) {
                const target = document.querySelector(targetId);
                if (target) {
                    event.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });

    const accordions = document.querySelectorAll('.accordion-trigger');
    accordions.forEach(trigger => {
        trigger.addEventListener('click', function () {
            const panel = this.nextElementSibling;
            if (!panel) return;
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', String(!expanded));
            panel.style.maxHeight = expanded ? null : panel.scrollHeight + 'px';
            panel.classList.toggle('hidden', expanded);
        });
    });

    const formSteps = document.querySelectorAll('.step-card');
    formSteps.forEach((step, index) => {
        if (index !== 0) step.classList.add('hidden');
    });

    document.querySelectorAll('[data-step-next]').forEach(button => {
        button.addEventListener('click', function () {
            const current = this.closest('.step-card');
            const nextId = this.dataset.stepNext;
            const next = document.querySelector(nextId);
            if (current && next) {
                current.classList.add('hidden');
                next.classList.remove('hidden');
                next.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    document.querySelectorAll('[data-step-back]').forEach(button => {
        button.addEventListener('click', function () {
            const current = this.closest('.step-card');
            const backId = this.dataset.stepBack;
            const back = document.querySelector(backId);
            if (current && back) {
                current.classList.add('hidden');
                back.classList.remove('hidden');
                back.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileNav = document.getElementById('mobileNav');

    if (mobileMenuButton && mobileNav) {
        mobileMenuButton.addEventListener('click', function () {
            mobileNav.classList.toggle('hidden');
        });
    }

    const headerLinks = document.querySelectorAll('header nav a');
    const currentUrl = window.location.href;
    headerLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && currentUrl.includes(href)) {
            link.classList.add('active');
        }
    });
});