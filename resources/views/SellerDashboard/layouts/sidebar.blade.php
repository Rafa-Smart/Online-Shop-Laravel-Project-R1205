<style>
    /* 1. WARNA UTAMA SIDEBAR */
    .app-sidebar {
        /* Warna latar belakang gelap yang sangat pekat */
        background-color: #0e1624 !important; 
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.4) !important; /* Tambahkan shadow gelap */
        border-right: 1px solid rgba(255, 255, 255, 0.05); /* Garis tipis pemisah */
    }

    /* 2. LOGO DAN BRANDING */
    .sidebar-brand {
        padding: 1rem 1.5rem; /* Padding yang lebih baik */
        border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* Garis pemisah yang halus */
    }
    .brand-link .brand-text {
        color: #ffffff !important; /* Pastikan teks logo berwarna putih */
        font-size: 1.6rem !important;
        letter-spacing: 0.5px; /* Sedikit spasi antar huruf agar terlihat premium */
    }

    /* 3. SEARCH BAR */
    .form-inline {
        padding: 0 1rem;
        margin-bottom: 7px;
    }
    .form-control-sidebar {
        background-color: #1a2436 !important; /* Warna input yang sedikit lebih terang */
        border: 1px solid #1a2436 !important;
        color: #e2e8f0 !important; /* Warna teks input */
        border-radius: 8px 0 0 8px !important;
    }
    .btn-sidebar {
        background-color: #1a2436 !important;
        color: #94a3b8 !important; /* Warna ikon yang lembut */
        /* border-radius: 0 8px 8px 0 !important; */
    }
    .btn-sidebar:hover {
        background-color: #2d3748 !important;
    }

</style>

 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
     <!--begin::Sidebar Brand-->
     <div class="sidebar-brand">
         <a href="./index.html" class="brand-link">
             <span class="brand-text fw-bold" style="font-size:1.5rem">Seller | KhadafiShop</span>
         </a>
     </div>

     <div class="form-inline mt-2">
         <div class="input-group" data-widget="sidebar-search">
             <input class="form-control form-control-sidebar" type="search" placeholder="Cari Produk..."
                 aria-label="Search">
             <div class="input-group-append">
                 <button class="btn btn-sidebar" type="submit">
                     <i class="bi bi-search"></i>
                 </button>
             </div>
         </div>
         <div class="sidebar-search-results">
             <div class="list-group">
             </div>
         </div>
     </div>
     <!--end::Sidebar Brand-->
     <!--begin::Sidebar Wrapper-->
     <div class="sidebar-wrapper">
         <nav class="mt-2">
             <!--begin::Sidebar Menu-->
             <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                 aria-label="Main navigation" data-accordion="false" id="navigation">
                 {{-- <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>
                             Dashboard
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./index.html" class="nav-link active">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Dashboard v1</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index2.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Dashboard v2</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./index3.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Dashboard v3</p>
                             </a>
                         </li>
                     </ul>
                 </li> --}}
                 <li class="nav-item">
                     <a href="{{ route('home') }}" class="nav-link">
                         <i class="bi bi-shop nav-icon"></i>
                         <p>Market</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('seller.dashboard') }}" class="nav-link">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>Seller Dashboard</p>
                     </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                         <i class="bi bi-boxes nav-icon"></i>
                         <p>
                             Products
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('seller.products.index') }}" class="nav-link active">
                                 <i class="bi bi-database nav-icon"></i>
                                 <p>Products Datas</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('seller.products.show') }}" class="nav-link">
                                 <i class="bi bi-bag-check nav-icon"></i>
                                 <p>Products Orders</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('ads.index') }}" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Ads</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-clipboard-fill"></i>
                         <p>
                             Layout Options
                             <span class="nav-badge badge text-bg-secondary me-3">6</span>
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./layout/unfixed-sidebar.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Default Sidebar</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/fixed-sidebar.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Fixed Sidebar</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/fixed-header.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Fixed Header</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/fixed-footer.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Fixed Footer</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/fixed-complete.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Fixed Complete</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/layout-custom-area.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Layout <small>+ Custom Area </small></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/sidebar-mini.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Sidebar Mini</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/collapsed-sidebar.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Sidebar Mini <small>+ Collapsed</small></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/logo-switch.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Sidebar Mini <small>+ Logo Switch</small></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./layout/layout-rtl.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Layout RTL</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-tree-fill"></i>
                         <p>
                             UI Elements
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./UI/general.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>General</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./UI/icons.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Icons</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./UI/timeline.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Timeline</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-pencil-square"></i>
                         <p>
                             Forms
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./forms/general.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>General Elements</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-table"></i>
                         <p>
                             Tables
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./tables/simple.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Simple Tables</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-header">EXAMPLES</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-box-arrow-in-right"></i>
                         <p>
                             Auth
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                 <p>
                                     Version 1
                                     <i class="nav-arrow bi bi-chevron-right"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="./examples/login.html" class="nav-link">
                                         <i class="nav-icon bi bi-circle"></i>
                                         <p>Login</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="./examples/register.html" class="nav-link">
                                         <i class="nav-icon bi bi-circle"></i>
                                         <p>Register</p>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                 <p>
                                     Version 2
                                     <i class="nav-arrow bi bi-chevron-right"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="./examples/login-v2.html" class="nav-link">
                                         <i class="nav-icon bi bi-circle"></i>
                                         <p>Login</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="./examples/register-v2.html" class="nav-link">
                                         <i class="nav-icon bi bi-circle"></i>
                                         <p>Register</p>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="./examples/lockscreen.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Lockscreen</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-header">DOCUMENTATIONS</li>
                 <li class="nav-item">
                     <a href="./docs/introduction.html" class="nav-link">
                         <i class="nav-icon bi bi-download"></i>
                         <p>Installation</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="./docs/layout.html" class="nav-link">
                         <i class="nav-icon bi bi-grip-horizontal"></i>
                         <p>Layout</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="./docs/color-mode.html" class="nav-link">
                         <i class="nav-icon bi bi-star-half"></i>
                         <p>Color Mode</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-ui-checks-grid"></i>
                         <p>
                             Components
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./docs/components/main-header.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Main Header</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="./docs/components/main-sidebar.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Main Sidebar</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-filetype-js"></i>
                         <p>
                             Javascript
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./docs/javascript/treeview.html" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Treeview</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="./docs/browser-support.html" class="nav-link">
                         <i class="nav-icon bi bi-browser-edge"></i>
                         <p>Browser Support</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="./docs/how-to-contribute.html" class="nav-link">
                         <i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                         <p>How To Contribute</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="./docs/faq.html" class="nav-link">
                         <i class="nav-icon bi bi-question-circle-fill"></i>
                         <p>FAQ</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="./docs/license.html" class="nav-link">
                         <i class="nav-icon bi bi-patch-check-fill"></i>
                         <p>License</p>
                     </a>
                 </li>
                 <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-circle-fill"></i>
                         <p>Level 1</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-circle-fill"></i>
                         <p>
                             Level 1
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Level 2</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>
                                     Level 2
                                     <i class="nav-arrow bi bi-chevron-right"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <i class="nav-icon bi bi-record-circle-fill"></i>
                                         <p>Level 3</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <i class="nav-icon bi bi-record-circle-fill"></i>
                                         <p>Level 3</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <i class="nav-icon bi bi-record-circle-fill"></i>
                                         <p>Level 3</p>
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Level 2</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-circle-fill"></i>
                         <p>Level 1</p>
                     </a>
                 </li>
                 <li class="nav-header">LABELS</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-circle text-danger"></i>
                         <p class="text">Important</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-circle text-warning"></i>
                         <p>Warning</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon bi bi-circle text-info"></i>
                         <p>Informational</p>
                     </a>
                 </li>
             </ul>
             <!--end::Sidebar Menu-->
         </nav>
     </div>
     <!--end::Sidebar Wrapper-->
 </aside>
