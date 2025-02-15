import './bootstrap';
import 'flowbite';
import barba from '@barba/core';
import gsap from 'gsap';

import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

function reinitializeComponents() {
  // Reinitialize any components that rely on attributes such as aria-selected, data-toggle, etc.
  // Example for Flowbite components:
  const dropdownToggles = document.querySelectorAll('[data-dropdown-toggle]');
  dropdownToggles.forEach(toggle => {
    const dropdown = new Dropdown(toggle);
    dropdown.init();
  });

  const tabs = document.querySelectorAll('[data-toggle="tab"]');
  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      const target = document.querySelector(this.getAttribute('data-target'));
      if (target) {
        const activeTab = document.querySelector('.tab-pane.active');
        if (activeTab) activeTab.classList.remove('active');
        target.classList.add('active');
      }
    });
  });
}

barba.init({
  transitions: [{
    name: 'page-transition',
    leave(data) {
      // return gsap.to(data.current.container, {
      //   opacity: 0,
      //   duration: 1,
      //   onComplete: () => {
      //     data.current.container.style.display = 'none';
      //   }
      // });
      document.querySelector('body').style.overflow = 'hidden';

      document.getElementById('dropdownNavbar').style.display = 'none';

      document.getElementById('nav_prestasi_circle').style.opacity = '1';

      return gsap.to("#nav_prestasi_circle", {
        scale: 600,
        duration: 0.7,
        onComplete: () => {
          data.current.container.style.display = 'none';
        }
      })
    },
    enter(data) {
      document.getElementById('dropdownNavbar').style.display = 'flex';

      data.next.container.style.display = 'flex';
      // return gsap.from(data.next.container, {
      //   opacity: 0,
      //   duration: 1
      // });
      return gsap.fromTo("#nav_prestasi_circle", {
        scale: 600,
        opacity: 1
      }, {
        scale: 1,
        duration: 0.7,
        onComplete: () => {
          document.getElementById("nav_prestasi_circle").style.opacity = "0";
          document.querySelector('body').style.overflow = 'auto';
        }
      })
    },
    afterEnter() {
      reinitializeComponents();
    }
  }]
});

document.addEventListener('DOMContentLoaded', reinitializeComponents);