window.addEventListener('DOMContentLoaded', function () {
    let vw = window.innerWidth,
        vh = window.innerHeight,
        documentBody = document.body,
        scrollbarWidth = window.outerWidth - window.innerWidth;
    function activateMenu() {
        const menuBtn = document.querySelector('.menu-toggle'),
            headerMenu = document.querySelector('.main-navigation'),
            menuLinks = headerMenu.querySelectorAll('.menu-link'),
            submenus = headerMenu.querySelectorAll('.sub-menu'),
            parentMenuItem = headerMenu.querySelectorAll('.menu-item-has-children');

        menuBtn.addEventListener('click', function (e) {
            if (menuBtn.classList.contains('active')) {
                menuBtn.classList.remove('active');
                headerMenu.classList.remove('active');
                documentBody.classList.remove('lock');
            } else {
                menuBtn.classList.add('active');
                headerMenu.classList.add('active');
                documentBody.classList.add('lock');
            }
        });
        menuLinks.forEach(function (el, i) {

            el.addEventListener('click', function (e) {
                if (!el.parentElement.classList.contains('menu-item-has-children') && menuBtn.classList.contains('active')) {
                    e.stopPropagation();
                    menuLinks.forEach(function (el, i) {
                        el.classList.remove('active');
                    });
                    e.target.classList.add('active');
                    menuBtn.classList.remove('active');
                    headerMenu.classList.remove('active');
                    documentBody.classList.remove('lock');
                }
            });

        });
        parentMenuItem.forEach(function (el, i) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const submenu = el.lastElementChild;
                const submenuChildren = submenu.querySelectorAll('.sub-menu');

                if (submenu.classList.contains('active')) {
                    submenu.classList.remove('active');
                    if (submenuChildren) {
                        submenuChildren.forEach(function (el, i) {
                            el.classList.remove('active');
                        });
                    }
                } else {
                    submenu.classList.add('active');
                }
                if (submenu.style.maxHeight) {
                    submenu.style.maxHeight = null;
                    if (submenuChildren) {
                        submenuChildren.forEach(function (el, i) {
                            if (el.style.maxHeight) {
                                el.style.maxHeight = null;
                            }
                        });
                    }
                } else {
                    submenu.style.maxHeight = submenu.scrollHeight * 2 + "px";
                    if (e.target.parentNode.classList.contains('sub-menu')) {
                        const parentMenu = e.target.parentNode;
                        parentMenu.style.maxHeight = (parentMenu.scrollHeight + submenu.scrollHeight) * 2 + "px";


                    }
                }
            });
        });
        documentBody.addEventListener('click', function (e) {
            if (menuBtn.classList.contains('active') && !e.target.closest('.main-navigation') && !e.target.classList.contains('menu-toggle') && !e.target.closest('.menu-toggle')) {
                submenus.forEach(function (el) {
                    el.classList.remove('active');
                });
                menuBtn.classList.remove('active');
                headerMenu.classList.remove('active');
                documentBody.classList.remove('lock');
            }

        });
    }
    activateMenu();
    function toggleSearch() {
        if (vw <= 768) {
            const openBtn = document.querySelector('.header-search__open'),
                closeBtn = document.querySelector('.header-search__close'),
                search = document.querySelector('.header-search');
            openBtn.addEventListener('click', function (e) {
                search.classList.add('active');
            });
            closeBtn.addEventListener('click', function (e) {
                search.classList.remove('active');
            });

        }
    }
    toggleSearch();
    // =================================================
});