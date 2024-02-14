@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div x-data="sales">
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Sales</span>
                </li>
            </ul>

            <div class="pt-5">
                <div class="mb-6 grid gap-6 xl:grid-cols-3">
                    <div class="panel h-full xl:col-span-2">
                        <div class="mb-5 flex items-center dark:text-white-light">
                            <h5 class="text-lg font-semibold">Revenue</h5>
                            <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto">
                                <a href="javascript:;" @click="toggle">
                                    <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    </svg>
                                </a>
                                <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                    <li><a href="javascript:;" @click="toggle">Weekly</a></li>
                                    <li><a href="javascript:;" @click="toggle">Monthly</a></li>
                                    <li><a href="javascript:;" @click="toggle">Yearly</a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-lg dark:text-white-light/90">Total Profit <span class="ml-2 text-primary">$10,840</span></p>
                        <div class="relative overflow-hidden">
                            <div x-ref="revenueChart" class="rounded-lg bg-white dark:bg-black">
                                <!-- loader -->
                                <div class="grid min-h-[325px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                    <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel h-full">
                        <div class="mb-5 flex items-center">
                            <h5 class="text-lg font-semibold dark:text-white-light">Sales By Category</h5>
                        </div>
                        <div class="overflow-hidden">
                            <div x-ref="salesByCategory" class="rounded-lg bg-white dark:bg-black">
                                <!-- loader -->
                                <div class="grid min-h-[353px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                    <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    <div class="panel h-full sm:col-span-2 xl:col-span-1">
                        <div class="mb-5 flex items-center">
                            <h5 class="text-lg font-semibold dark:text-white-light">
                                Daily Sales <span class="block text-sm font-normal text-white-dark">Go to columns for details.</span>
                            </h5>
                            <div class="relative ltr:ml-auto rtl:mr-auto">
                                <div class="grid h-11 w-11 place-content-center rounded-full bg-[#ffeccb] text-warning dark:bg-warning dark:text-[#ffeccb]">
                                    <svg width="40" height="40" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div x-ref="dailySales" class="rounded-lg bg-white dark:bg-black">
                                <!-- loader -->
                                <div class="grid min-h-[175px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                    <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel h-full">
                        <div class="mb-5 flex items-center dark:text-white-light">
                            <h5 class="text-lg font-semibold">Summary</h5>
                            <div x-data="dropdown" @click.outside="open = false" class="dropdown ltr:ml-auto rtl:mr-auto">
                                <a href="javascript:;" @click="toggle">
                                    <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    </svg>
                                </a>
                                <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                    <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                    <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                    <li><a href="javascript:;" @click="toggle">Mark as Done</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="space-y-9">
                            <div class="flex items-center">
                                <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                                    <div class="grid h-9 w-9 place-content-center rounded-full bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light">
                                        <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.74157 18.5545C4.94119 20 7.17389 20 11.6393 20H12.3605C16.8259 20 19.0586 20 20.2582 18.5545M3.74157 18.5545C2.54194 17.1091 2.9534 14.9146 3.77633 10.5257C4.36155 7.40452 4.65416 5.84393 5.76506 4.92196M3.74157 18.5545C3.74156 18.5545 3.74157 18.5545 3.74157 18.5545ZM20.2582 18.5545C21.4578 17.1091 21.0464 14.9146 20.2235 10.5257C19.6382 7.40452 19.3456 5.84393 18.2347 4.92196M20.2582 18.5545C20.2582 18.5545 20.2582 18.5545 20.2582 18.5545ZM18.2347 4.92196C17.1238 4 15.5361 4 12.3605 4H11.6393C8.46374 4 6.87596 4 5.76506 4.92196M18.2347 4.92196C18.2347 4.92196 18.2347 4.92196 18.2347 4.92196ZM5.76506 4.92196C5.76506 4.92196 5.76506 4.92196 5.76506 4.92196Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-2 flex font-semibold text-white-dark">
                                        <h6>Income</h6>
                                        <p class="ltr:ml-auto rtl:mr-auto">$92,600</p>
                                    </div>
                                    <div class="h-2 rounded-full bg-dark-light shadow dark:bg-[#1b2e4b]">
                                        <div class="h-full w-11/12 rounded-full bg-gradient-to-r from-[#7579ff] to-[#b224ef]"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                                    <div class="grid h-9 w-9 place-content-center rounded-full bg-success-light text-success dark:bg-success dark:text-success-light">
                                        <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.72848 16.1369C3.18295 14.5914 2.41018 13.8186 2.12264 12.816C1.83509 11.8134 2.08083 10.7485 2.57231 8.61875L2.85574 7.39057C3.26922 5.59881 3.47597 4.70292 4.08944 4.08944C4.70292 3.47597 5.59881 3.26922 7.39057 2.85574L8.61875 2.57231C10.7485 2.08083 11.8134 1.83509 12.816 2.12264C13.8186 2.41018 14.5914 3.18295 16.1369 4.72848L17.9665 6.55812C20.6555 9.24711 22 10.5916 22 12.2623C22 13.933 20.6555 15.2775 17.9665 17.9665C15.2775 20.6555 13.933 22 12.2623 22C10.5916 22 9.24711 20.6555 6.55812 17.9665L4.72848 16.1369Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <circle opacity="0.5" cx="8.60699" cy="8.87891" r="2" transform="rotate(-45 8.60699 8.87891)" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path opacity="0.5" d="M11.5417 18.5L18.5208 11.5208" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-2 flex font-semibold text-white-dark">
                                        <h6>Profit</h6>
                                        <p class="ltr:ml-auto rtl:mr-auto">$37,515</p>
                                    </div>
                                    <div class="h-2 w-full rounded-full bg-dark-light shadow dark:bg-[#1b2e4b]">
                                        <div class="h-full w-full rounded-full bg-gradient-to-r from-[#3cba92] to-[#0ba360]" style="width: 65%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="h-9 w-9 ltr:mr-3 rtl:ml-3">
                                    <div class="grid h-9 w-9 place-content-center rounded-full bg-warning-light text-warning dark:bg-warning dark:text-warning-light">
                                        <svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M10 16H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M14 16H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M2 10L22 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="mb-2 flex font-semibold text-white-dark">
                                        <h6>Expenses</h6>
                                        <p class="ltr:ml-auto rtl:mr-auto">$55,085</p>
                                    </div>
                                    <div class="h-2 w-full rounded-full bg-dark-light shadow dark:bg-[#1b2e4b]">
                                        <div class="h-full w-full rounded-full bg-gradient-to-r from-[#f09819] to-[#ff5858]" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel h-full p-0">
                        <div class="absolute flex w-full items-center justify-between p-5">
                            <div class="relative">
                                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-success-light text-success dark:bg-success dark:text-success-light">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M11 9H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M5 6H16.4504C18.5054 6 19.5328 6 19.9775 6.67426C20.4221 7.34853 20.0173 8.29294 19.2078 10.1818L18.7792 11.1818C18.4013 12.0636 18.2123 12.5045 17.8366 12.7523C17.4609 13 16.9812 13 16.0218 13H5" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                </div>
                            </div>
                            <h5 class="text-2xl font-semibold ltr:text-right rtl:text-left dark:text-white-light">
                                3,192
                                <span class="block text-sm font-normal">Total Orders</span>
                            </h5>
                        </div>
                        <div x-ref="totalOrders" class="overflow-hidden rounded-lg bg-transparent">
                            <!-- loader -->
                            <div class="grid min-h-[290px] place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08]">
                                <span class="inline-flex h-5 w-5 animate-spin rounded-full border-2 border-black !border-l-transparent dark:border-white"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    <div class="panel h-full pb-0 sm:col-span-2 xl:col-span-1">
                        <h5 class="mb-5 text-lg font-semibold dark:text-white-light">Recent Activities</h5>

                        <div class="perfect-scrollbar relative -mr-3 mb-4 h-[290px] pr-3">
                            <div class="cursor-pointer text-sm">
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-primary ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Updated Server Logs</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">Just Now</div>

                                    <span class="badge badge-outline-primary absolute bg-primary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-success ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Send Mail to HR and Admin</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">2 min ago</div>

                                    <span class="badge badge-outline-success absolute bg-success-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-danger ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Backup Files EOD</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">14:00</div>

                                    <span class="badge badge-outline-danger absolute bg-danger-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-black ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Collect documents from Sara</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">16:00</div>

                                    <span class="badge badge-outline-dark absolute bg-dark-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-warning ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Conference call with Marketing Manager.</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                    <span class="badge badge-outline-warning absolute bg-warning-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">In progress</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-info ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Rebooted Server</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                    <span class="badge badge-outline-info absolute bg-info-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-secondary ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Send contract details to Freelancer</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">18:00</div>

                                    <span class="badge badge-outline-secondary absolute bg-secondary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-primary ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Updated Server Logs</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">Just Now</div>

                                    <span class="badge badge-outline-primary absolute bg-primary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-success ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Send Mail to HR and Admin</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">2 min ago</div>

                                    <span class="badge badge-outline-success absolute bg-success-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-danger ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Backup Files EOD</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">14:00</div>

                                    <span class="badge badge-outline-danger absolute bg-danger-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-black ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Collect documents from Sara</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">16:00</div>

                                    <span class="badge badge-outline-dark absolute bg-dark-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-warning ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Conference call with Marketing Manager.</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                    <span class="badge badge-outline-warning absolute bg-warning-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">In progress</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-info ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Rebooted Server</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">17:00</div>

                                    <span class="badge badge-outline-info absolute bg-info-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Completed</span>
                                </div>
                                <div class="group relative flex items-center py-1.5">
                                    <div class="h-1.5 w-1.5 rounded-full bg-secondary ltr:mr-1 rtl:ml-1.5"></div>
                                    <div class="flex-1">Send contract details to Freelancer</div>
                                    <div class="text-xs text-white-dark ltr:ml-auto rtl:mr-auto dark:text-gray-500">18:00</div>

                                    <span class="badge badge-outline-secondary absolute bg-secondary-light text-xs opacity-0 group-hover:opacity-100 ltr:right-0 rtl:left-0 dark:bg-[#0e1726]">Pending</span>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-white-light dark:border-white/10">
                            <a href="javascript:;" class="group group flex items-center justify-center p-4 font-semibold hover:text-primary">
                                View All
                                <svg class="h-4 w-4 transition duration-300 group-hover:translate-x-1 ltr:ml-1 rtl:mr-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="panel h-full">
                        <div class="mb-5 flex items-center justify-between dark:text-white-light">
                            <h5 class="text-lg font-semibold">Transactions</h5>
                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="toggle">
                                    <svg class="h-5 w-5 text-black/70 hover:!text-primary dark:text-white/70" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                        <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    </svg>
                                </a>
                                <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                    <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                    <li><a href="javascript:;" @click="toggle">Edit Report</a></li>
                                    <li><a href="javascript:;" @click="toggle">Mark as Done</a></li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="space-y-6">
                                <div class="flex">
                                    <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-success-light text-base text-success dark:bg-success dark:text-success-light">SP</span>
                                    <div class="flex-1 px-3">
                                        <div>StarCode Kh</div>
                                        <div class="text-xs text-white-dark dark:text-gray-500">10 Jan 1:00PM</div>
                                    </div>
                                    <span class="whitespace-pre px-1 text-base text-success ltr:ml-auto rtl:mr-auto">+$36.11</span>
                                </div>
                                <div class="flex">
                                    <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-warning-light text-warning dark:bg-warning dark:text-warning-light">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                            <path d="M2 10C2 7.17157 2 5.75736 2.87868 4.87868C3.75736 4 5.17157 4 8 4H13C15.8284 4 17.2426 4 18.1213 4.87868C19 5.75736 19 7.17157 19 10C19 12.8284 19 14.2426 18.1213 15.1213C17.2426 16 15.8284 16 13 16H8C5.17157 16 3.75736 16 2.87868 15.1213C2 14.2426 2 12.8284 2 10Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M19.0003 7.07617C19.9754 7.17208 20.6317 7.38885 21.1216 7.87873C22.0003 8.75741 22.0003 10.1716 22.0003 13.0001C22.0003 15.8285 22.0003 17.2427 21.1216 18.1214C20.2429 19.0001 18.8287 19.0001 16.0003 19.0001H11.0003C8.17187 19.0001 6.75766 19.0001 5.87898 18.1214C5.38909 17.6315 5.17233 16.9751 5.07642 16" stroke="currentColor" stroke-width="1.5"></path>
                                            <path d="M13 10C13 11.3807 11.8807 12.5 10.5 12.5C9.11929 12.5 8 11.3807 8 10C8 8.61929 9.11929 7.5 10.5 7.5C11.8807 7.5 13 8.61929 13 10Z" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M16 12L16 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M5 12L5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </span>
                                    <div class="flex-1 px-3">
                                        <div>Cash withdrawal</div>
                                        <div class="text-xs text-white-dark dark:text-gray-500">04 Jan 1:00PM</div>
                                    </div>
                                    <span class="whitespace-pre px-1 text-base text-danger ltr:ml-auto rtl:mr-auto">-$16.44</span>
                                </div>
                                <div class="flex">
                                    <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-danger-light text-danger dark:bg-danger dark:text-danger-light">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path opacity="0.5" d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                    </span>
                                    <div class="flex-1 px-3">
                                        <div>Amy Diaz</div>
                                        <div class="text-xs text-white-dark dark:text-gray-500">10 Jan 1:00PM</div>
                                    </div>
                                    <span class="whitespace-pre px-1 text-base text-success ltr:ml-auto rtl:mr-auto">+$66.44</span>
                                </div>
                                <div class="flex">
                                    <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-secondary-light text-secondary dark:bg-secondary dark:text-secondary-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveaspectratio="xMidYMid meet" viewbox="0 0 24 24">
                                            <path fill="currentColor" d="M5.398 0v.006c3.028 8.556 5.37 15.175 8.348 23.596c2.344.058 4.85.398 4.854.398c-2.8-7.924-5.923-16.747-8.487-24zm8.489 0v9.63L18.6 22.951c-.043-7.86-.004-15.913.002-22.95zM5.398 1.05V24c1.873-.225 2.81-.312 4.715-.398v-9.22z"></path>
                                        </svg>
                                    </span>
                                    <div class="flex-1 px-3">
                                        <div>Netflix</div>
                                        <div class="text-xs text-white-dark dark:text-gray-500">04 Jan 1:00PM</div>
                                    </div>
                                    <span class="whitespace-pre px-1 text-base text-danger ltr:ml-auto rtl:mr-auto">-$32.00</span>
                                </div>
                                <div class="flex">
                                    <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-info-light text-base text-info dark:bg-info dark:text-info-light">DA</span>
                                    <div class="flex-1 px-3">
                                        <div>Daisy Anderson</div>
                                        <div class="text-xs text-white-dark dark:text-gray-500">10 Jan 1:00PM</div>
                                    </div>
                                    <span class="whitespace-pre px-1 text-base text-success ltr:ml-auto rtl:mr-auto">+$10.08</span>
                                </div>
                                <div class="flex">
                                    <span class="grid h-9 w-9 shrink-0 place-content-center rounded-md bg-primary-light text-primary dark:bg-primary dark:text-primary-light">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.926 9.70541C13.5474 9.33386 13.5474 8.74151 13.5474 7.55682V7.24712C13.5474 3.96249 13.5474 2.32018 12.6241 2.03721C11.7007 1.75425 10.711 3.09327 8.73167 5.77133L5.66953 9.91436C4.3848 11.6526 3.74244 12.5217 4.09639 13.205C4.10225 13.2164 4.10829 13.2276 4.1145 13.2387C4.48945 13.9117 5.59888 13.9117 7.81775 13.9117C9.05079 13.9117 9.6673 13.9117 10.054 14.2754" stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M13.9259 9.70557L13.9459 9.72481C14.3326 10.0885 14.9492 10.0885 16.1822 10.0885C18.4011 10.0885 19.5105 10.0885 19.8854 10.7615C19.8917 10.7726 19.8977 10.7838 19.9036 10.7951C20.2575 11.4785 19.6151 12.3476 18.3304 14.0858L15.2682 18.2288C13.2888 20.9069 12.2991 22.2459 11.3758 21.9629C10.4524 21.68 10.4524 20.0376 10.4525 16.753L10.4525 16.4434C10.4525 15.2587 10.4525 14.6663 10.074 14.2948L10.054 14.2755" stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                    </span>
                                    <div class="flex-1 px-3">
                                        <div>Electricity Bill</div>
                                        <div class="text-xs text-white-dark dark:text-gray-500">04 Jan 1:00PM</div>
                                    </div>
                                    <span class="whitespace-pre px-1 text-base text-danger ltr:ml-auto rtl:mr-auto">-$22.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel h-full overflow-hidden border-0 p-0">
                        <div class="min-h-[190px] bg-gradient-to-r from-[#4361ee] to-[#160f6b] p-6">
                            <div class="mb-6 flex items-center justify-between">
                                <div class="flex items-center rounded-full bg-black/50 p-1 font-semibold text-white ltr:pr-3 rtl:pl-3">
                                    <img class="block h-8 w-8 rounded-full border-2 border-white/50 object-cover ltr:mr-1 rtl:ml-1" src="assets/images/profile-34.jpeg" alt="image">
                                    StarCode Kh
                                </div>
                                <button type="button" class="flex h-9 w-9 items-center justify-between rounded-md bg-black text-white hover:opacity-80 ltr:ml-auto rtl:mr-auto">
                                    <svg class="m-auto h-6 w-6" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center justify-between text-white">
                                <p class="text-xl">Wallet Balance</p>
                                <h5 class="text-2xl ltr:ml-auto rtl:mr-auto"><span class="text-white-light">$</span>2953</h5>
                            </div>
                        </div>
                        <div class="-mt-12 grid grid-cols-2 gap-2 px-8">
                            <div class="rounded-md bg-white px-4 py-2.5 shadow dark:bg-[#060818]">
                                <span class="mb-4 flex items-center justify-between dark:text-white">Received
                                    <svg class="h-4 w-4 text-success" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 15L12 9L5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <div class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                                    $97.99
                                </div>
                            </div>
                            <div class="rounded-md bg-white px-4 py-2.5 shadow dark:bg-[#060818]">
                                <span class="mb-4 flex items-center justify-between dark:text-white">Spent
                                    <svg class="h-4 w-4 text-danger" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <div class="btn w-full border-0 bg-[#ebedf2] py-1 text-base text-[#515365] shadow-none dark:bg-black dark:text-[#bfc9d4]">
                                    $53.00
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="mb-5">
                                <span class="rounded-full bg-[#1b2e4b] px-4 py-1.5 text-xs text-white before:inline-block before:h-1.5 before:w-1.5 before:rounded-full before:bg-white ltr:before:mr-2 rtl:before:ml-2">Pending</span>
                            </div>
                            <div class="mb-5 space-y-1">
                                <div class="flex items-center justify-between">
                                    <p class="font-semibold text-[#515365]">Netflix</p>
                                    <p class="text-base"><span>$</span> <span class="font-semibold">13.85</span></p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="font-semibold text-[#515365]">BlueHost VPN</p>
                                    <p class="text-base"><span>$</span> <span class="font-semibold">15.66</span></p>
                                </div>
                            </div>
                            <div class="flex justify-around px-2 text-center">
                                <button type="button" class="btn btn-secondary ltr:mr-2 rtl:ml-2">View Details</button>
                                <button type="button" class="btn btn-success">Pay Now $29.51</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="panel h-full w-full">
                        <div class="mb-5 flex items-center justify-between">
                            <h5 class="text-lg font-semibold dark:text-white-light">Recent Orders</h5>
                        </div>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="ltr:rounded-l-md rtl:rounded-r-md">Customer</th>
                                        <th>Product</th>
                                        <th>Invoice</th>
                                        <th>Price</th>
                                        <th class="ltr:rounded-r-md rtl:rounded-l-md">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="min-w-[150px] text-black dark:text-white">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/profile-9.jpeg" alt="avatar">
                                                <span class="whitespace-nowrap">Luke Ivory</span>
                                            </div>
                                        </td>
                                        <td class="text-primary">Headphone</td>
                                        <td><a href="apps-invoice-preview.html">#46894</a></td>
                                        <td>$56.07</td>
                                        <td><span class="badge bg-success shadow-md dark:group-hover:bg-transparent">Paid</span></td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/profile-10.jpeg" alt="avatar">
                                                <span class="whitespace-nowrap">Andy King</span>
                                            </div>
                                        </td>
                                        <td class="text-info">Nike Sport</td>
                                        <td><a href="apps-invoice-preview.html">#76894</a></td>
                                        <td>$126.04</td>
                                        <td><span class="badge bg-secondary shadow-md dark:group-hover:bg-transparent">Shipped</span></td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/profile-12.jpeg" alt="avatar">
                                                <span class="whitespace-nowrap">Laurie Fox</span>
                                            </div>
                                        </td>
                                        <td class="text-warning">Sunglasses</td>
                                        <td><a href="apps-invoice-preview.html">#66894</a></td>
                                        <td>$56.07</td>
                                        <td><span class="badge bg-success shadow-md dark:group-hover:bg-transparent">Paid</span></td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/profile-9.jpeg" alt="avatar">
                                                <span class="whitespace-nowrap">Ryan Collins</span>
                                            </div>
                                        </td>
                                        <td class="text-danger">Sport</td>
                                        <td><a href="apps-invoice-preview.html">#75844</a></td>
                                        <td>$110.00</td>
                                        <td><span class="badge bg-secondary shadow-md dark:group-hover:bg-transparent">Shipped</span></td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex items-center">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/profile-10.jpeg" alt="avatar">
                                                <span class="whitespace-nowrap">Irene Collins</span>
                                            </div>
                                        </td>
                                        <td class="text-secondary">Speakers</td>
                                        <td><a href="apps-invoice-preview.html">#46894</a></td>
                                        <td>$56.07</td>
                                        <td><span class="badge bg-success shadow-md dark:group-hover:bg-transparent">Paid</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel h-full w-full">
                        <div class="mb-5 flex items-center justify-between">
                            <h5 class="text-lg font-semibold dark:text-white-light">Top Selling Product</h5>
                        </div>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr class="border-b-0">
                                        <th class="ltr:rounded-l-md rtl:rounded-r-md">Product</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Sold</th>
                                        <th class="ltr:rounded-r-md rtl:rounded-l-md">Source</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="min-w-[150px] text-black dark:text-white">
                                            <div class="flex">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/product-headphones.jpg" alt="avatar">
                                                <p class="whitespace-nowrap">Headphone <span class="block text-xs text-primary">Digital</span></p>
                                            </div>
                                        </td>
                                        <td>$168.09</td>
                                        <td>$60.09</td>
                                        <td>170</td>
                                        <td>
                                            <a class="flex items-center text-danger" href="javascript:;">
                                                <svg class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.6644 5.47875L16.6367 9.00968C18.2053 10.404 18.9896 11.1012 18.9896 11.9993C18.9896 12.8975 18.2053 13.5946 16.6367 14.989L12.6644 18.5199C11.9484 19.1563 11.5903 19.4746 11.2952 19.342C11 19.2095 11 18.7305 11 17.7725V15.4279C7.4 15.4279 3.5 17.1422 2 19.9993C2 10.8565 7.33333 8.57075 11 8.57075V6.22616C11 5.26817 11 4.78917 11.2952 4.65662C11.5903 4.52407 11.9484 4.8423 12.6644 5.47875Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path opacity="0.5" d="M15.5386 4.5L20.7548 9.34362C21.5489 10.081 22.0001 11.1158 22.0001 12.1994C22.0001 13.3418 21.4989 14.4266 20.629 15.1671L15.5386 19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>

                                                Direct
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/product-shoes.jpg" alt="avatar">
                                                <p class="whitespace-nowrap">Shoes <span class="block text-xs text-warning">Faishon</span></p>
                                            </div>
                                        </td>
                                        <td>$126.04</td>
                                        <td>$47.09</td>
                                        <td>130</td>
                                        <td>
                                            <a class="flex items-center text-success" href="javascript:;">
                                                <svg class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.6644 5.47875L16.6367 9.00968C18.2053 10.404 18.9896 11.1012 18.9896 11.9993C18.9896 12.8975 18.2053 13.5946 16.6367 14.989L12.6644 18.5199C11.9484 19.1563 11.5903 19.4746 11.2952 19.342C11 19.2095 11 18.7305 11 17.7725V15.4279C7.4 15.4279 3.5 17.1422 2 19.9993C2 10.8565 7.33333 8.57075 11 8.57075V6.22616C11 5.26817 11 4.78917 11.2952 4.65662C11.5903 4.52407 11.9484 4.8423 12.6644 5.47875Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path opacity="0.5" d="M15.5386 4.5L20.7548 9.34362C21.5489 10.081 22.0001 11.1158 22.0001 12.1994C22.0001 13.3418 21.4989 14.4266 20.629 15.1671L15.5386 19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                                Google
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/product-watch.jpg" alt="avatar">
                                                <p class="whitespace-nowrap">Watch <span class="block text-xs text-danger">Accessories</span></p>
                                            </div>
                                        </td>
                                        <td>$56.07</td>
                                        <td>$20.00</td>
                                        <td>66</td>
                                        <td>
                                            <a class="flex items-center text-warning" href="javascript:;">
                                                <svg class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.6644 5.47875L16.6367 9.00968C18.2053 10.404 18.9896 11.1012 18.9896 11.9993C18.9896 12.8975 18.2053 13.5946 16.6367 14.989L12.6644 18.5199C11.9484 19.1563 11.5903 19.4746 11.2952 19.342C11 19.2095 11 18.7305 11 17.7725V15.4279C7.4 15.4279 3.5 17.1422 2 19.9993C2 10.8565 7.33333 8.57075 11 8.57075V6.22616C11 5.26817 11 4.78917 11.2952 4.65662C11.5903 4.52407 11.9484 4.8423 12.6644 5.47875Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path opacity="0.5" d="M15.5386 4.5L20.7548 9.34362C21.5489 10.081 22.0001 11.1158 22.0001 12.1994C22.0001 13.3418 21.4989 14.4266 20.629 15.1671L15.5386 19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                                Ads
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/product-laptop.jpg" alt="avatar">
                                                <p class="whitespace-nowrap">Laptop <span class="block text-xs text-primary">Digital</span></p>
                                            </div>
                                        </td>
                                        <td>$110.00</td>
                                        <td>$33.00</td>
                                        <td>35</td>
                                        <td>
                                            <a class="flex items-center text-secondary" href="javascript:;">
                                                <svg class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.6644 5.47875L16.6367 9.00968C18.2053 10.404 18.9896 11.1012 18.9896 11.9993C18.9896 12.8975 18.2053 13.5946 16.6367 14.989L12.6644 18.5199C11.9484 19.1563 11.5903 19.4746 11.2952 19.342C11 19.2095 11 18.7305 11 17.7725V15.4279C7.4 15.4279 3.5 17.1422 2 19.9993C2 10.8565 7.33333 8.57075 11 8.57075V6.22616C11 5.26817 11 4.78917 11.2952 4.65662C11.5903 4.52407 11.9484 4.8423 12.6644 5.47875Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path opacity="0.5" d="M15.5386 4.5L20.7548 9.34362C21.5489 10.081 22.0001 11.1158 22.0001 12.1994C22.0001 13.3418 21.4989 14.4266 20.629 15.1671L15.5386 19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                                Email
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="group text-white-dark hover:text-black dark:hover:text-white-light/90">
                                        <td class="text-black dark:text-white">
                                            <div class="flex">
                                                <img class="h-8 w-8 rounded-md object-cover ltr:mr-3 rtl:ml-3" src="assets/images/product-camera.jpg" alt="avatar">
                                                <p class="whitespace-nowrap">Camera <span class="block text-xs text-primary">Digital</span></p>
                                            </div>
                                        </td>
                                        <td>$56.07</td>
                                        <td>$26.04</td>
                                        <td>30</td>
                                        <td>
                                            <a class="flex items-center text-primary" href="javascript:;">
                                                <svg class="h-3.5 w-3.5 ltr:mr-1 rtl:ml-1 rtl:rotate-180" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.6644 5.47875L16.6367 9.00968C18.2053 10.404 18.9896 11.1012 18.9896 11.9993C18.9896 12.8975 18.2053 13.5946 16.6367 14.989L12.6644 18.5199C11.9484 19.1563 11.5903 19.4746 11.2952 19.342C11 19.2095 11 18.7305 11 17.7725V15.4279C7.4 15.4279 3.5 17.1422 2 19.9993C2 10.8565 7.33333 8.57075 11 8.57075V6.22616C11 5.26817 11 4.78917 11.2952 4.65662C11.5903 4.52407 11.9484 4.8423 12.6644 5.47875Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path opacity="0.5" d="M15.5386 4.5L20.7548 9.34362C21.5489 10.081 22.0001 11.1158 22.0001 12.1994C22.0001 13.3418 21.4989 14.4266 20.629 15.1671L15.5386 19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                                Referral
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
