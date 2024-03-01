<div class="offcanvas offcanvas-start bg-[#010F54] " data-widget="tree" tabindex=" -1" id="offcanvasExample"
     aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-header flex ">
        <img src=" {{ asset ('assets/images/TAFTAC_logo(white).png') }}" alt=" logo"
             class='items-center ml-5 w-60 h-12' />
        <button type="button" class="btn -mt-5 -mr-2 text-white text-4xl " data-bs-dismiss="offcanvas"
                aria-label="Close" fdprocessedid="edqpv">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-left"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
            </svg>
        </button>
    </div>

    <div class="offcanvas-body  ">
        <hr class='border-white mr-2 ml-2 mb-2 -mt-4 border-2' />

        <div class="text-white ">
            <div class='treeview '>
                <button class=' w-full h-16 hover:bg-blue-900 rounded flex items-center'  onclick="window.location.href = '/home';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-house-door ml-[6%] w-6 h-6" viewBox="0 0 16 16">
                            <path
                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                        </svg>
                        <!-- <img src=" {{ asset ('assets/image/home.png') }}" alt=" Profile" class='ml-[6%] w-6 h-6  ' /> -->
                        <h1 class=' text-xl ml-[10%]'>Dashboard</h1>

                </button>


            <!-- leave -->

                <a class='w-full h-16 hover:bg-blue-900 rounded flex items-center'>

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-menu-button-wide-fill ml-[6%] w-6 h-6" viewBox="0 0 16 16">
                        <path
                            d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5" />
                    </svg>
                    <div class='w-20 ml-[10%]'>
                        <h1 class=' text-xl'>Leave</h1>
                    </div>
                    <span class="ml-[45%]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-chevron-down w-5 h-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                        </svg>
                    </span>
                </a>
                <ul class="treeview-menu ">
                    <a class='w-full h-16 hover:bg-blue-900 rounded flex items-center' href='/staff/applyleave'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-journal-plus ml-[20%] w-5 h-5" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5"/>
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                        </svg>
                        <h1 class='ml-[10%] text-l'>Apply Leave</h1>
                    </a>
                    <a class='w-full h-16 hover:bg-blue-900 rounded flex items-center' href='/staff/leave/history'>

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-journals ml-[20%] w-5 h-5" viewBox="0 0 16 16">
                            <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2"/>
                            <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0"/>
                        </svg>
                        <h1 class='ml-[10%] text-l'>Leave History</h1>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
