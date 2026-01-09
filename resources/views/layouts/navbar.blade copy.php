 <!-- Page sidebar start-->
 <div class="overlay"></div>
 {{-- <aside class="page-sidebar" data-sidebar-layout="stroke-svg"> --}}
 <aside class="page-sidebar iconcolor-sidebar" data-sidebar-layout="iconcolor-sidebar">
     <div class="left-arrow" id="left-arrow">
         <svg class="feather">
             <use href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#arrow-left">
             </use>
         </svg>
     </div>
     <div id="sidebar-menu">
         <ul class="sidebar-menu" id="simple-bar">
             <li class="pin-title sidebar-list p-0">
                 <h5 class="sidebar-main-title">Pinned</h5>
             </li>
             <li class="line pin-line"></li>
             <li class="sidebar-main-title">General</li>

             @php
                 $permission = session()->get('permission');
             @endphp
             @if (isset($permission) && $permission->dashboard)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/dashboard') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Home">
                             </use>
                         </svg><span>Dashboard</span>
                         <div class="badge badge-primary rounded-pill">3</div>
                     </a>
                 </li>
             @endif

             @if (isset($permission) && $permission->search)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/search') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Search">
                             </use>
                         </svg><span>Search Order</span></a>
                 </li>
             @endif
             @if (isset($permission) && $permission->hardware)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/hardware') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Activity">
                             </use>
                         </svg><span>Hardware</span>
                     </a>
                 </li>
             @endif
             @if (isset($permission) && $permission->sendkey)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/sendkey') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Password">
                             </use>
                         </svg><span>Send Key Manually</span>
                     </a>
                 </li>
             @endif
             @if (isset($permission) && $permission->buynowexe)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg>
                     <a class="sidebar-link" href="{{ url('/buynowexe') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Game">
                             </use>
                         </svg><span>BuyNowExe Count</span>
                     </a>
                 </li>
             @endif
             @if (isset($permission) && $permission->await)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/await') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Document">
                             </use>
                         </svg><span>Awaited List</span>
                     </a>

                 </li>
             @endif
             @if (isset($permission) &&
                     ($permission->keysent ||
                         $permission->failedlist ||
                         $permission->keynotsent ||
                         $permission->fraudOrDuplicatePayments ||
                         $permission->dealerportalpayments ||
                         $permission->productwisecount ||
                         $permission->allproductwisecount ||
                         $permission->replaceproduct))
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Swap"></use>
                         </svg>
                         <span>Transactions</span>
                         <svg class="feather">
                             <use
                                 href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                             </use>
                         </svg></a>
                     <ul class="sidebar-submenu">
                         @if (isset($permission) && $permission->keysent)
                             <li>
                                 <a href="{{ url('/keysent') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Key Sent: Customer List
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->failedlist)
                             <li>
                                 <a href="{{ url('/failedlist') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     View Failed / Pending Transaction
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->keynotsent)
                             <li>
                                 <a href="{{ url('/keynotsent') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Key Not Sent Customer List
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->fraudOrDuplicatePayments)
                             <li>
                                 <a href="{{ url('/fraudOrDuplicatePayments') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Duplicate Or Fraud Customer List
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->dealerportalpayments)
                             <li>
                                 <a href="{{ url('/dealerportalpayments') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Dealer Portal Payment
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->productwisecount)
                             <li>
                                 <a href="{{ url('/productwisecount') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Product Wise Count
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->allproductwisecount)
                             <li>
                                 <a href="{{ url('/allproductwisecount') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     All Product Wise Count
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->replaceproduct)
                             <li>
                                 <a href="{{ url('/replaceproduct') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Replace Product With Order
                                 </a>
                             </li>
                         @endif
                     </ul>

                 </li>
             @endif

             @if ((isset($permission) && $permission->addkey) || $permission->addkeynew || $permission->addkeyfamilypack)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="javascript:void(0)">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Wallet">
                             </use>
                         </svg><span>Stock</span><svg class="feather">
                             <use
                                 href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                             </use>
                         </svg></a>

                     <ul class="sidebar-submenu">
                         @if (isset($permission) && $permission->addkey)
                             <li>
                                 <a href="{{ url('/addkey') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Add New Key Numbers (Old)
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->addkeynew)
                             <li>
                                 <a href="{{ url('/addkeynew') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Add New Key Numbers (New)
                                 </a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->addkeyfamilypack)
                             <li>
                                 <a href="{{ url('/addkeyfamilypack') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3"></use>
                                     </svg>
                                     Add FamilyPack Key Numbers
                                 </a>
                             </li>
                         @endif
                     </ul>

                 </li>
             @endif


             @if (
                 (isset($permission) && $permission->buynowexelog) ||
                     $permission->buynoworderlog ||
                     $permission->invoicelog ||
                     $permission->editionupgradelog ||
                     $permission->productstocklog ||
                     $permission->latepaymentclearedlog ||
                     $permission->internationalpaymentlog ||
                     $permission->epsrenewallog ||
                     $permission->failedpaymentslog ||
                     $permission->actionlog)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="javascript:void(0)">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pie">
                             </use>
                         </svg><span>Log</span>
                         <svg class="feather">
                             <use
                                 href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                             </use>
                         </svg></a>
                     <ul class="sidebar-submenu">
                         @if (isset($permission) && $permission->buynowexelog)
                             <li><a href="{{ url('/buynowexelog') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>BuyNowExeLog</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->buynoworderlog)
                             <li><a href="{{ url('/buynoworderlog') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>BuyNowOrderLog</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->invoicelog)
                             <li><a href="{{ url('/invoicelog') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Invoice Log</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->editionupgradelog)
                             <li><a href="{{ url('/editionupgradelog') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Pay Edition Upgrade Log</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->productstocklog)
                             <li><a href="{{ url('/productstocklog') }}" target="_blank">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Product Logs</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->latepaymentclearedlog)
                             <li><a href="{{ url('/latepaymentclearedlog') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Late Payment Cleared Log</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->internationalpaymentlog)
                             <li><a href="{{ url('/internationalpaymentlog') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>International Payment Log</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->epsrenewallog)
                             <li><a href="{{ url('/epsrenewallog') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>EPS Renewal Log</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->failedpaymentslog)
                             <li><a href="{{ url('/failedpaymentslog') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Failed Payments</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->actionlog)
                             <li><a href="{{ url('/actionlog') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Action Logs</a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif

             @if (isset($permission) && $permission->offer)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/offer') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Paper-plus">
                             </use>
                         </svg><span>Offer</span></a>
                 </li>
             @endif
             @if (isset($permission) && $permission->generatezip)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/generatezip') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Wallet">
                             </use>
                         </svg><span>Generate Zip</span></a>
                 </li>
             @endif

             @if (isset($permission) && $permission->keyfind)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/keyfind') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Password">
                             </use>
                         </svg><span>Key Find</span></a>
                 </li>
             @endif
             @if (isset($permission) && $permission->blockrenewal)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/blockrenewal') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Danger">
                             </use>
                         </svg><span>Block Renewal Popup</span></a>
                 </li>
             @endif
             @if (isset($permission) && $permission->usermaster)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Profile">
                         </use>
                     </svg><a class="sidebar-link" href="{{ url('/usermaster') }}">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Profile">
                             </use>
                         </svg><span>UserMaster</span></a>
                 </li>
             @endif
             @if (
                 (isset($permission) && $permission->banner) ||
                     $permission->feedback ||
                     $permission->contactus ||
                     $permission->generateticket ||
                     $permission->mctlinks ||
                     $permission->productreview ||
                     $permission->demorequest ||
                     $permission->productmaster ||
                     $permission->producthardwarerate)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="javascript:void(0)">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Activity">
                             </use>
                         </svg><span>NPAV Website</span>
                         <svg class="feather">
                             <use
                                 href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                             </use>
                         </svg></a>
                     <ul class="sidebar-submenu">
                         @if (isset($permission) && $permission->banner)
                             <li><a href="{{ url('/banner') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Banner</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->feedback)
                             <li><a href="{{ url('/feedback') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Feedback</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->contactus)
                             <li><a href="{{ url('/contactus') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Contact us</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->generateticket)
                             <li><a href="{{ url('/generateticket') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Genarate Ticket</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->mctlinks)
                             <li><a href="{{ url('/mctlinks') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Mct_links</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->productreview)
                             <li><a href="{{ url('/productreview') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Product Review</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->demorequest)
                             <li><a href="{{ url('/demorequest') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Demo Request</a>
                             </li>
                         @endif
                         @if (isset($permission) && !empty($permission->productmaster))
                             <li><a href="{{ url('/productmaster') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Product Master</a>
                             </li>
                         @endif
                         @if (isset($permission) && !empty($permission->producthardwarerate))
                             <li><a href="{{ url('/producthardwarerate') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Hardware Rate Master</a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif

             {{-- ----------------------------------------------------------------------------------------------------- --}}
             <li class="sidebar-main-title">Npav Tools</li>
             @if ((isset($permission) && $permission->blockkey) || $permission->encryptiondecryption)
                 <li class="sidebar-list">
                     <svg class="pinned-icon">
                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                         </use>
                     </svg><a class="sidebar-link" href="javascript:void(0)">
                         <svg class="stroke-icon">
                             <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Filter">
                             </use>
                         </svg><span>Tools</span>
                         <svg class="feather">
                             <use
                                 href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                             </use>
                         </svg></a>
                     <ul class="sidebar-submenu">
                         @if (isset($permission) && $permission->blockkey)
                             <li><a href="{{ url('/blockkey') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Block Key</a>
                             </li>
                         @endif
                         @if (isset($permission) && $permission->encryptiondecryption)
                             <li><a href="{{ url('/encryptiondecryption') }}">
                                     <svg class="svg-menu">
                                         <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                         </use>
                                     </svg>Encrption & Decription</a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
         </ul>
     </div>
     <div class="right-arrow" id="right-arrow">
         <svg class="feather">
             <use href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#arrow-right">
             </use>
         </svg>
     </div>
 </aside>
 <!-- Page sidebar end-->
