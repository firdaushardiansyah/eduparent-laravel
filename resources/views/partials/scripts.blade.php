<!-- jQuery Core JS -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Bootstrap 5 Bundle JS (with Popper) -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Simplebar Scrollbar JS -->
<script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>

@stack('scripts')

<!-- Main Template JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Global CSRF Setup & Mobile Sidebar Accessibility Hardening -->
<script>
    (function () {
        'use strict';

        // 1. Setup CSRF Token for jQuery AJAX
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (window.jQuery && csrfToken) {
            window.jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
        }

        // 2. Setup CSRF Token for window.fetch requests to same origin
        if (window.fetch && csrfToken) {
            const originalFetch = window.fetch;
            window.fetch = function (input, init = {}) {
                init.headers = init.headers || {};
                if (init.headers instanceof Headers) {
                    if (!init.headers.has('X-CSRF-TOKEN')) {
                        init.headers.set('X-CSRF-TOKEN', csrfToken);
                    }
                } else if (Array.isArray(init.headers)) {
                    const hasToken = init.headers.some(([k]) => k.toLowerCase() === 'x-csrf-token');
                    if (!hasToken) {
                        init.headers.push(['X-CSRF-TOKEN', csrfToken]);
                    }
                } else {
                    if (!init.headers['X-CSRF-TOKEN'] && !init.headers['x-csrf-token']) {
                        init.headers['X-CSRF-TOKEN'] = csrfToken;
                    }
                }
                return originalFetch(input, init);
            };
        }

        // 3. Setup CSRF Token for Axios if loaded
        if (window.axios && csrfToken) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
        }

        // 4. Mobile Sidebar Accessibility, Scroll Locking & Keyboard Trap
        const mobileBtn = document.getElementById('mobile_btn');
        const sidebar = document.getElementById('sidebar');
        const wrapper = document.querySelector('.main-wrapper');

        function isMobileSidebarOpen() {
            return wrapper ? wrapper.classList.contains('slide-nav') : false;
        }

        function updateAriaState(isOpen) {
            if (mobileBtn) {
                mobileBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            }
            if (isOpen) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        function closeMobileSidebar() {
            if (wrapper && wrapper.classList.contains('slide-nav')) {
                wrapper.classList.remove('slide-nav');
                const overlay = document.querySelector('.sidebar-overlay');
                if (overlay) overlay.classList.remove('opened');
                document.documentElement.classList.remove('menu-opened');
                updateAriaState(false);
                if (mobileBtn) mobileBtn.focus();
            }
        }

        if (mobileBtn) {
            mobileBtn.addEventListener('click', function () {
                // Short timeout to allow script.js toggle to apply
                setTimeout(function () {
                    const opened = isMobileSidebarOpen();
                    updateAriaState(opened);
                    if (opened && sidebar) {
                        // Focus first focusable element inside sidebar
                        const focusable = sidebar.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                        if (focusable.length > 0) {
                            focusable[0].focus();
                        }
                    }
                }, 50);
            });
        }

        // Close on overlay click
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('sidebar-overlay')) {
                closeMobileSidebar();
            }
            if (e.target && (e.target.classList.contains('sidebar-close') || e.target.closest('.sidebar-close'))) {
                closeMobileSidebar();
            }
        });

        // Close when clicking a menu link on mobile screens (< 992px)
        document.addEventListener('click', function (e) {
            if (window.innerWidth < 992 && e.target.closest('#sidebar-menu a')) {
                // If it's not a submenu parent toggle
                const link = e.target.closest('a');
                if (link && !link.parentElement.classList.contains('submenu')) {
                    closeMobileSidebar();
                }
            }
        });

        // Close on Escape key press & keep focus
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && isMobileSidebarOpen()) {
                e.preventDefault();
                closeMobileSidebar();
            }
        });
    })();
</script>

