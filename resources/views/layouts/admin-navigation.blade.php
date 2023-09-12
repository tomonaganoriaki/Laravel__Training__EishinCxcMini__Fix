<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.items.lists')" :active="request()->routeIs('admin.items.lists')">
                        <p style="text-align: center">求人<br>一覧/管理</p>
                    </x-nav-link>
                    
                    <x-nav-link :href="route('admin.owners.index')" :active="request()->routeIs('admin.owners.index')">
                       <p style="text-align: center">企業<br>一覧/管理</p>
                    </x-nav-link>
                    <x-nav-link :href="route('admin.owners.account.index')" :active="request()->routeIs('admin.owners.account.index')">
                        <p style="text-align: center">企業アカウント<br>一覧/管理</p>
                     </x-nav-link>
                    <x-nav-link :href="route('admin.industry.index')" :active="request()->routeIs('admin.industry.index')">
                        <p style="text-align: center">業界<br>一覧/管理</p>
                         
                     </x-nav-link>
                     <x-nav-link :href="route('admin.feature.index')" :active="request()->routeIs('admin.feature.index')">
                        <p style="text-align: center">求人の特徴<br>一覧/管理</p>
                         
                     </x-nav-link>
                    <x-nav-link :href="route('admin.expired-owners.index')" :active="request()->routeIs('admin.owners.index')">
                        <p style="text-align: center">企業ゴミ箱<br>（完全削除前）</p>
                     </x-nav-link>
                   
        
                    <div class="mt-3 space-y-1">
       
        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    {{-- <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot> --}}

                    <x-slot name="content">
                        <x-dropdown-link :href="route('admin.profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

          
        </div>
    </div>

</nav>
