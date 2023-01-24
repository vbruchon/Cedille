let sidebar = document.getElementById('single_formation_sidebar_left');
        let prog = document.getElementById("single_formation_titre");

        let content = document.getElementById("single_formation_content");
        let contentAfterFix = "single_formation_content_after_fix";


        let isMobile = window.innerWidth <= 767;
        let mobileClass = "sidebar_mobile";

        let lengthTablettMin = window.innerWidth >= 768;
        let lengthTablettMax = window.innerWidth <= 1100;
        let isTablett = lengthTablettMin & lengthTablettMax;
        let tablettClass = "sidebar_tablett";

        let isDesktop = window.innerWidth > 1101;
        let pcClass = "sidebar_pc";



        document.addEventListener('DOMContentLoaded', () => {
          if (isMobile) {
            sidebar.classList.add(mobileClass)
            let mt = sidebar.offsetHeight;
            prog.style.marginTop = mt + "px";
          } else if (isTablett) {
            prog.style.marginTop = 0
            window.addEventListener('scroll', () => {
              if (window.scrollY >= 114) {
                sidebar.classList.add(tablettClass);
                content.classList.add(contentAfterFix)
              } else if (window.scrollY <= 113) {
                if (sidebar.className === tablettClass) {
                  sidebar.classList.remove(sidebar.className)
                }
                if (content.className === contentAfterFix) {
                  content.classList.remove(content.className)
                }
              }
            })
          } else if (isDesktop) {
            prog.style.marginTop = 0
            window.addEventListener('scroll', () => {
              if (window.scrollY >= 210) {
                sidebar.classList.add(pcClass);
                content.classList.add(contentAfterFix);
              } else if (window.scrollY <= 209) {
                if (sidebar.className === pcClass) {
                  sidebar.classList.remove(sidebar.className)
                }
                if (content.className === contentAfterFix) {
                  content.classList.remove(content.className)
                }
              }
            });
          }
        })