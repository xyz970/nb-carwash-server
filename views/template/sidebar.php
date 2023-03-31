<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo">
        <img src="<?=ASSET_PATH?>img/logo.png" alt="" height="50" width="100">
      </span>
      <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">NB-Carwash</span> -->
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item <?= getActivePage('admin') ?>">
      <a href="<?= BASE_URL ?>admin" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengeluaran</span></li>
    <li class="menu-item <?= getActivePage('pengeluaran') ?>">
      <a href="<?= BASE_URL ?>pengeluaran" class="menu-link">
        <i class="menu-icon tf-icons bx bx-dollar"></i>
        <div data-i18n="Analytics">Data Pengeluaran</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
    <li class="menu-item <?= getActivePage('transaksi') ?>">
      <a href="<?= BASE_URL ?>transaksi" class="menu-link">
        <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
        <div data-i18n="Analytics">Transaksi</div>
      </a>
    </li>
    <li class="menu-item <?= getActivePage('reservasi') ?>">
      <a href="<?= BASE_URL ?>reservasi" class="menu-link">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Analytics">Reservasi</div>
      </a>
    </li>
    <li class="menu-item  <?= getActivePage('tarif') ?>">
      <a href="<?= BASE_URL ?>tarif" class="menu-link"> 
        <i class="menu-icon tf-icons bx bx-food-menu"></i>
        <div data-i18n="Analytics">Tarif</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Keuntungan</span></li>
    <li class="menu-item  <?= getActivePage('keuntungan') ?>">
      <a href="<?= BASE_URL ?>keuntungan" class="menu-link">
        <i class="menu-icon tf-icons bx bx-wallet"></i>
        <div data-i18n="Analytics">Jumlah Keuntungan</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Master</span></li>
    <li class="menu-item <?=getActivePage('karyawan')?>">
        <a href="<?=BASE_URL?>karyawan" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user-check" type="solid"></i>
          <div data-i18n="Analytics">Data Karyawan</div>
        </a>
    </li>
    <li class="menu-item <?=getActivePage('sesi')?>">
        <a href="<?=BASE_URL?>sesi" class="menu-link">
          <i class="menu-icon tf-icons bx bx-calendar" type="solid"></i>
          <div data-i18n="Analytics">Data Sesi</div>
        </a>
    </li>
    <li class="menu-item <?= getActivePage('rekap') ?>">
      <a href="<?= BASE_URL ?>rekap" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book-open" type="solid"></i>
        <div data-i18n="Analytics">Data Rekapan</div>
      </a>
    </li>

  </ul>
</aside>