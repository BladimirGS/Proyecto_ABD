<div x-cloak x-data="sidebar()" class="flex items-start bg-gray-900">
  <div class=" z-40 transition-all duration-300">
      <div class="flex justify-end">
          <button @click="sidebarOpen = !sidebarOpen" :class="{'hover:bg-gray-300': !sidebarOpen, 'hover:bg-gray-700': sidebarOpen}" class="transition-all duration-300 w-8 p-1 mx-3 my-2 rounded-full focus:outline-none ">
              <svg viewBox="0 0 20 20" class="w-6 h-6 fill-current" :class="{'text-gray-600': !sidebarOpen, 'text-gray-300': sidebarOpen}">
              <path x-show="!sidebarOpen" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
              <path x-show="sidebarOpen" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
          </button>
      </div>
  </div>

  <div x-cloak wire:ignore :class="{'w-56': sidebarOpen, 'w-0': !sidebarOpen}" class=" bottom-0 left-0 z-30 block w-56 h-full min-h-screen overflow-y-auto text-gray-400 transition-all duration-300 ease-in-out bg-gray-900 shadow-lg overflow-x-hidden">

      <div class="flex flex-col items-stretch justify-between h-full">
          <div class="flex flex-col flex-shrink-0 w-full">
              <div class="flex items-center justify-center px-8 py-3 text-center">
                  <a class="shrink-0 flex items-center cursor-pointer">
                      <x-application-logo />
                  </a>
              </div>

              <nav>
                  <div class="flex-grow md:block md:overflow-y-auto overflow-x-hidden" :class="{'opacity-1': sidebarOpen, 'opacity-0': !sidebarOpen}">
                      <a class="flex justify-start items-center px-4 py-3 hover:bg-gray-800 hover:text-gray-400 focus:bg-gray-800 focus:outline-none focus:ring" href="#">
                          <span class="mx-4">Dashboard</span>
                      </a>
                  </div>
              </nav>
          </div>
      </div>

      <script>
      function sidebar() {
          return {
          sidebarOpen: true,
          sidebarProductMenuOpen: false,
          openSidebar() {
              this.sidebarOpen = true
          },
          closeSidebar() {
              this.sidebarOpen = false
          },
          sidebarProductMenu() {
              if (this.sidebarProductMenuOpen === true) {
              this.sidebarProductMenuOpen = false
              window.localStorage.setItem('sidebarProductMenuOpen', 'close');
              } else {
              this.sidebarProductMenuOpen = true
              window.localStorage.setItem('sidebarProductMenuOpen', 'open');
              }
          },
          checkSidebarProductMenu() {
              if (window.localStorage.getItem('sidebarProductMenuOpen')) {
              if (window.localStorage.getItem('sidebarProductMenuOpen') === 'open') {
                  this.sidebarProductMenuOpen = true
              } else {
                  this.sidebarProductMenuOpen = false
                  window.localStorage.setItem('sidebarProductMenuOpen', 'close');
              }
              }
          },
          }
      }
      </script>
  </div>
</div>