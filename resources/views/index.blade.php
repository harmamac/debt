<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>

    <!-- PWA Meta Tags -->
    <meta name="theme-color" content="#667eea">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Money Manager">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تتبع الديون والمصاريف</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <!-- Gradient Orbs -->
        <div class="gradient-orb orb-1"></div>
        <div class="gradient-orb orb-2"></div>
        <div class="gradient-orb orb-3"></div>
        <div class="gradient-orb orb-4"></div>
        
        <!-- Floating Shapes -->
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
            <div class="shape shape-6"></div>
        </div>
        
        <!-- Grid Pattern Overlay -->
        <div class="grid-pattern"></div>
    </div>

    <!-- Main App Container -->
    <div class="app-container">
        <div class="container">
            
            <!-- Header Card with Glass Effect -->
            <div class="header-card glass-card">
                <!-- Logo/Brand Section -->
                <div class="brand-section">
                    <div class="logo-wrapper">
                        <svg class="logo-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/>
                        </svg>
                    </div>
                    <h1 class="main-title">
                        <span class="title-text">تتبع الديون والمصاريف</span>
                        <span class="title-glow"></span>
                    </h1>
                    <a href="{{ route('logout') }}" class="logout-btn" style="position: absolute; top: 1rem; left: 1rem; background: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; font-weight: bold;">
    تسجيل خروج 🚪
</a>
                </div>
                
                <!-- Summary Cards Grid -->
                <div class="summary-grid">
                    <!-- Owed By Me Card (Red) -->
                    <div class="summary-card card-owed-by-me">
                        <div class="card-icon-wrapper card-icon-red">
                            <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 19V5M5 12l7-7 7 7"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <div class="summary-label">أنا مدين لهم</div>
                            <div class="currency-row">
                                <div class="currency-amount">
                                    <span class="currency-symbol">₽</span>
                                    <span class="summary-amount">{{ number_format($totalOwedByMeRUB, 2) }}</span>
                                </div>
                                <div class="currency-amount">
                                    <span class="currency-symbol usdt">USDT</span>
                                    <span class="summary-amount">{{ number_format($totalOwedByMeUSDT, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-shine"></div>
                    </div>
                    
                    <!-- Owed To Me Card (Green) -->
                    <div class="summary-card card-owed-to-me">
                        <div class="card-icon-wrapper card-icon-green">
                            <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14M5 12l7 7 7-7"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <div class="summary-label">مدينين لي</div>
                            <div class="currency-row">
                                <div class="currency-amount">
                                    <span class="currency-symbol">₽</span>
                                    <span class="summary-amount">{{ number_format($totalOwedToMeRUB, 2) }}</span>
                                </div>
                                <div class="currency-amount">
                                    <span class="currency-symbol usdt">USDT</span>
                                    <span class="summary-amount">{{ number_format($totalOwedToMeUSDT, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-shine"></div>
                    </div>
                </div>
{{-- <div class="balance-card balance-neutral">
    <div class="balance-icon-wrapper">
        <svg class="balance-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 6v6l4 2"/>
        </svg>
    </div>
    <div class="balance-content">
        <div class="balance-header">
            <span class="balance-label">الرصيد الكلي للديون</span>
        </div>
        <div class="currency-row">
            <div class="currency-amount">
                <span class="currency-symbol">₽</span>
                <span class="balance-amount @if($debtBalanceRUB > 0) amount-positive @elseif($debtBalanceRUB < 0) amount-negative @else amount-neutral @endif">
                    {{ $debtBalanceRUB > 0 ? '+' : '' }}{{ number_format($debtBalanceRUB, 2) }}
                </span>
            </div>
            <div class="currency-amount">
                <span class="currency-symbol usdt">USDT</span>
                <span class="balance-amount @if($debtBalanceUSDT > 0) amount-positive @elseif($debtBalanceUSDT < 0) amount-negative @else amount-neutral @endif">
                    {{ $debtBalanceUSDT > 0 ? '+' : '' }}{{ number_format($debtBalanceUSDT, 2) }}
                </span>
            </div>
        </div>
        <div class="balance-status-row">
            <span class="status-item @if($debtBalanceRUB > 0) status-positive @elseif($debtBalanceRUB < 0) status-negative @else status-neutral @endif">
                <span class="status-indicator"></span>
                ₽ @if($debtBalanceRUB > 0) لك @elseif($debtBalanceRUB < 0) عليك @else متعادل @endif
            </span>
            <span class="status-item @if($debtBalanceUSDT > 0) status-positive @elseif($debtBalanceUSDT < 0) status-negative @else status-neutral @endif">
                <span class="status-indicator"></span>
                USDT @if($debtBalanceUSDT > 0) لك @elseif($debtBalanceUSDT < 0) عليك @else متعادل @endif
            </span>
        </div>
    </div>
    <div class="card-shine"></div>
</div>

                <!-- Safekeeping Card (Blue) -->
                <div class="summary-card card-safekeeping">
                    <div class="card-icon-wrapper card-icon-blue">
                        <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </div>
                    <div class="card-content">
                        <div class="summary-label">الأمانات (محفوظ عندي)</div>
                        <div class="currency-row">
                            <div class="currency-amount">
                                <span class="currency-symbol">₽</span>
                                <span class="summary-amount">{{ number_format($totalSafekeepingRUB, 2) }}</span>
                            </div>
                            <div class="currency-amount">
                                <span class="currency-symbol usdt">USDT</span>
                                <span class="summary-amount">{{ number_format($totalSafekeepingUSDT, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-shine"></div>
                </div> --}}

                <!-- Debt Balance Cards (Side by Side) -->
<div class="summary-grid">
    <!-- RUB Balance Card -->
    <div class="summary-card @if($debtBalanceRUB > 0) card-owed-to-me @elseif($debtBalanceRUB < 0) card-owed-by-me @else card-expenses @endif">
        <div class="card-icon-wrapper @if($debtBalanceRUB > 0) card-icon-green @elseif($debtBalanceRUB < 0) card-icon-red @else card-icon-gray @endif">
            <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2"/>
            </svg>
        </div>
        <div class="card-content">
            <div class="summary-label">الرصيد ₽</div>
            <div class="summary-amount @if($debtBalanceRUB > 0) amount-positive @elseif($debtBalanceRUB < 0) amount-negative @else amount-neutral @endif">
                {{ $debtBalanceRUB > 0 ? '+' : '' }}{{ number_format($debtBalanceRUB, 2) }}
            </div>
            <div class="balance-status-mini @if($debtBalanceRUB > 0) status-positive @elseif($debtBalanceRUB < 0) status-negative @else status-neutral @endif">
                <span class="status-indicator"></span>
                @if($debtBalanceRUB > 0) لك @elseif($debtBalanceRUB < 0) عليك @else متعادل @endif
            </div>
        </div>
        <div class="card-shine"></div>
    </div>

    <!-- USDT Balance Card -->
    <div class="summary-card @if($debtBalanceUSDT > 0) card-owed-to-me @elseif($debtBalanceUSDT < 0) card-owed-by-me @else card-expenses @endif">
        <div class="card-icon-wrapper @if($debtBalanceUSDT > 0) card-icon-green @elseif($debtBalanceUSDT < 0) card-icon-red @else card-icon-gray @endif">
            <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2"/>
            </svg>
        </div>
        <div class="card-content">
            <div class="summary-label">الرصيد USDT</div>
            <div class="summary-amount @if($debtBalanceUSDT > 0) amount-positive @elseif($debtBalanceUSDT < 0) amount-negative @else amount-neutral @endif">
                {{ $debtBalanceUSDT > 0 ? '+' : '' }}{{ number_format($debtBalanceUSDT, 2) }}
            </div>
            <div class="balance-status-mini @if($debtBalanceUSDT > 0) status-positive @elseif($debtBalanceUSDT < 0) status-negative @else status-neutral @endif">
                <span class="status-indicator"></span>
                @if($debtBalanceUSDT > 0) لك @elseif($debtBalanceUSDT < 0) عليك @else متعادل @endif
            </div>
        </div>
        <div class="card-shine"></div>
    </div>
</div>



<!-- Safekeeping Cards (Side by Side) -->
<div class="summary-grid">
    <!-- RUB Safekeeping -->
    <div class="summary-card card-safekeeping">
        <div class="card-icon-wrapper card-icon-blue">
            <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
        </div>
        <div class="card-content">
            <div class="summary-label">الأمانات ₽</div>
            <div class="summary-amount">{{ number_format($totalSafekeepingRUB, 2) }}</div>
        </div>
        <div class="card-shine"></div>
    </div>

    <!-- USDT Safekeeping -->
    <div class="summary-card card-safekeeping">
        <div class="card-icon-wrapper card-icon-blue">
            <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0110 0v4"/>
            </svg>
        </div>
        <div class="card-content">
            <div class="summary-label">الأمانات USDT</div>
            <div class="summary-amount">{{ number_format($totalSafekeepingUSDT, 2) }}</div>
        </div>
        <div class="card-shine"></div>
    </div>
</div>



                <!-- Expenses Card (Gray/Purple) -->
                <div class="summary-card card-expenses">
                    <div class="card-icon-wrapper card-icon-gray">
                        <svg class="card-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/>
                            <line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                    </div>
                    <div class="card-content">
                        <div class="summary-label">إجمالي المصاريف</div>
                        <div class="currency-row">
                            <div class="currency-amount">
                                <span class="currency-symbol">₽</span>
                                <span class="summary-amount">{{ number_format($totalExpensesRUB, 2) }}</span>
                            </div>
                            <div class="currency-amount">
                                <span class="currency-symbol usdt">USDT</span>
                                <span class="summary-amount">{{ number_format($totalExpensesUSDT, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-shine"></div>
                </div>
            </div>

            <!-- Main Content Card with Tabs -->
            <div class="main-card glass-card" x-data="{ tab: '{{ $activeTab ?? 'owedByMe' }}' }">
                
                <!-- Tabs Navigation -->
                <div class="tabs-container">
                    <button @click="tab = 'owedByMe'" 
                        :class="tab === 'owedByMe' ? 'tab-button tab-active tab-red' : 'tab-button'">
                        <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 19V5M5 12l7-7 7 7"/>
                        </svg>
                        <span>مدين لهم</span>
                    </button>
                    <button @click="tab = 'owedToMe'" 
                        :class="tab === 'owedToMe' ? 'tab-button tab-active tab-green' : 'tab-button'">
                        <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12l7 7 7-7"/>
                        </svg>
                        <span>مدينين لي</span>
                    </button>
                    <button @click="tab = 'safekeeping'" 
                        :class="tab === 'safekeeping' ? 'tab-button tab-active tab-blue' : 'tab-button'">
                        <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                        <span>الأمانات</span>
                    </button>
                    <button @click="tab = 'expenses'" 
                        :class="tab === 'expenses' ? 'tab-button tab-active tab-gray' : 'tab-button'">
                        <svg class="tab-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/>
                            <line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                        <span>مصاريفي</span>
                    </button>
                </div>

                <!-- Forms Section -->
                <div class="form-container">
                    <!-- Debt Form (Owed By Me) -->
                    <form x-show="tab === 'owedByMe'" x-cloak method="POST" action="{{ route('debt.store') }}" class="entry-form">
                        @csrf
                        <input type="hidden" name="type" value="owed_by_me">
                        <div class="form-row">
                            <div class="input-wrapper">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                                <input type="text" name="person_name" placeholder="اسم الشخص" required class="form-input">
                            </div>
                        </div>
                        <div class="form-row form-row-inline">
                            <div class="input-wrapper flex-grow">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="1" x2="12" y2="23"/>
                                    <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                </svg>
                                <input type="number" name="amount" step="0.01" placeholder="المبلغ" required class="form-input">
                            </div>
                            <div class="select-wrapper">
                                <select name="currency" required class="currency-selector">
                                    <option value="RUB">₽ روبل</option>
                                    <option value="USDT">USDT</option>
                                </select>
                                <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </div>
                            <button type="submit" class="btn btn-submit btn-red">
                                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                <span>إضافة</span>
                            </button>
                        </div>
                    </form>

                    <!-- Debt Form (Owed To Me) -->
                    <form x-show="tab === 'owedToMe'" x-cloak method="POST" action="{{ route('debt.store') }}" class="entry-form">
                        @csrf
                        <input type="hidden" name="type" value="owed_to_me">
                        <div class="form-row">
                            <div class="input-wrapper">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                                <input type="text" name="person_name" placeholder="اسم الشخص" required class="form-input">
                            </div>
                        </div>
                        <div class="form-row form-row-inline">
                            <div class="input-wrapper flex-grow">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="1" x2="12" y2="23"/>
                                    <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                </svg>
                                <input type="number" name="amount" step="0.01" placeholder="المبلغ" required class="form-input">
                            </div>
                            <div class="select-wrapper">
                                <select name="currency" required class="currency-selector">
                                    <option value="RUB">₽ روبل</option>
                                    <option value="USDT">USDT</option>
                                </select>
                                <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </div>
                            <button type="submit" class="btn btn-submit btn-green">
                                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                <span>إضافة</span>
                            </button>
                        </div>
                    </form>

                    <!-- Safekeeping Form -->
                    <form x-show="tab === 'safekeeping'" x-cloak method="POST" action="{{ route('safekeeping.store') }}" class="entry-form">
                        @csrf
                        <div class="form-row">
                            <div class="input-wrapper">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                                <input type="text" name="person_name" placeholder="اسم الشخص" required class="form-input">
                            </div>
                        </div>
                        <div class="form-row form-row-inline">
                            <div class="input-wrapper flex-grow">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="1" x2="12" y2="23"/>
                                    <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                </svg>
                                <input type="number" name="amount" step="0.01" placeholder="المبلغ" required class="form-input">
                            </div>
                            <div class="select-wrapper">
                                <select name="currency" required class="currency-selector">
                                    <option value="RUB">₽ روبل</option>
                                    <option value="USDT">USDT</option>
                                </select>
                                <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </div>
                            <button type="submit" class="btn btn-submit btn-blue">
                                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                <span>إضافة</span>
                            </button>
                        </div>
                    </form>

                    <!-- Expense Form -->
                    <form x-show="tab === 'expenses'" x-cloak method="POST" action="{{ route('expense.store') }}" class="entry-form">
                        @csrf
                        <div class="form-row form-row-inline">
                            <div class="input-wrapper flex-grow">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="1" x2="12" y2="23"/>
                                    <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                </svg>
                                <input type="number" name="amount" step="0.01" placeholder="المبلغ" required class="form-input">
                            </div>
                            <div class="select-wrapper">
                                <select name="currency" required class="currency-selector">
                                    <option value="RUB">₽ روبل</option>
                                    <option value="USDT">USDT</option>
                                </select>
                                <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </div>
                            <button type="submit" class="btn btn-submit btn-gray">
                                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                <span>إضافة</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Lists Section -->
                <div class="list-container">
                    
                    <!-- Owed By Me List -->
                    <div x-show="tab === 'owedByMe'" x-cloak>
                        <div class="two-column-grid">
                            <!-- RUB Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-rub">
                                    <span class="column-currency-icon">₽</span>
                                    <span>الروبل</span>
                                </div>
                                @php $rubDebts = $owedByMe->where('currency', 'RUB'); @endphp
                                @if($rubDebts->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($rubDebts as $debt)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-person">
                                                            <div class="person-avatar">{{ mb_substr($debt->person_name, 0, 1) }}</div>
                                                            <span class="item-person-name">{{ $debt->person_name }}</span>
                                                        </div>
                                                        <div class="item-amount">{{ number_format($debt->amount, 2) }} <span class="amount-currency">₽</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('debt.delete', $debt->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('debt.update', $debt->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="text" name="person_name" value="{{ $debt->person_name }}" required class="form-input">
                                                </div>
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $debt->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $debt->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $debt->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- USDT Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-usdt">
                                    <span class="column-currency-icon">₮</span>
                                    <span>USDT</span>
                                </div>
                                @php $usdtDebts = $owedByMe->where('currency', 'USDT'); @endphp
                                @if($usdtDebts->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($usdtDebts as $debt)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-person">
                                                            <div class="person-avatar">{{ mb_substr($debt->person_name, 0, 1) }}</div>
                                                            <span class="item-person-name">{{ $debt->person_name }}</span>
                                                        </div>
                                                        <div class="item-amount">{{ number_format($debt->amount, 2) }} <span class="amount-currency">USDT</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('debt.delete', $debt->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('debt.update', $debt->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="text" name="person_name" value="{{ $debt->person_name }}" required class="form-input">
                                                </div>
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $debt->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $debt->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $debt->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Owed To Me List -->
                    <div x-show="tab === 'owedToMe'" x-cloak>
                        <div class="two-column-grid">
                            <!-- RUB Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-rub">
                                    <span class="column-currency-icon">₽</span>
                                    <span>الروبل</span>
                                </div>
                                @php $rubDebts = $owedToMe->where('currency', 'RUB'); @endphp
                                @if($rubDebts->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($rubDebts as $debt)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-person">
                                                            <div class="person-avatar">{{ mb_substr($debt->person_name, 0, 1) }}</div>
                                                            <span class="item-person-name">{{ $debt->person_name }}</span>
                                                        </div>
                                                        <div class="item-amount">{{ number_format($debt->amount, 2) }} <span class="amount-currency">₽</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('debt.delete', $debt->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('debt.update', $debt->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="text" name="person_name" value="{{ $debt->person_name }}" required class="form-input">
                                                </div>
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $debt->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $debt->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $debt->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- USDT Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-usdt">
                                    <span class="column-currency-icon">₮</span>
                                    <span>USDT</span>
                                </div>
                                @php $usdtDebts = $owedToMe->where('currency', 'USDT'); @endphp
                                @if($usdtDebts->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($usdtDebts as $debt)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-person">
                                                            <div class="person-avatar">{{ mb_substr($debt->person_name, 0, 1) }}</div>
                                                            <span class="item-person-name">{{ $debt->person_name }}</span>
                                                        </div>
                                                        <div class="item-amount">{{ number_format($debt->amount, 2) }} <span class="amount-currency">USDT</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('debt.delete', $debt->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $debt->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('debt.update', $debt->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="text" name="person_name" value="{{ $debt->person_name }}" required class="form-input">
                                                </div>
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $debt->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $debt->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $debt->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Safekeeping List -->
                    <div x-show="tab === 'safekeeping'" x-cloak>
                        <div class="two-column-grid">
                            <!-- RUB Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-rub">
                                    <span class="column-currency-icon">₽</span>
                                    <span>الروبل</span>
                                </div>
                                @php $rubSafe = $safekeeping->where('currency', 'RUB'); @endphp
                                @if($rubSafe->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($rubSafe as $safe)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-person">
                                                            <div class="person-avatar">{{ mb_substr($safe->person_name, 0, 1) }}</div>
                                                            <span class="item-person-name">{{ $safe->person_name }}</span>
                                                        </div>
                                                        <div class="item-amount">{{ number_format($safe->amount, 2) }} <span class="amount-currency">₽</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('safekeeping.delete', $safe->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $safe->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $safe->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('safekeeping.update', $safe->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="text" name="person_name" value="{{ $safe->person_name }}" required class="form-input">
                                                </div>
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $safe->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $safe->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $safe->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- USDT Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-usdt">
                                    <span class="column-currency-icon">₮</span>
                                    <span>USDT</span>
                                </div>
                                @php $usdtSafe = $safekeeping->where('currency', 'USDT'); @endphp
                                @if($usdtSafe->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($usdtSafe as $safe)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-person">
                                                            <div class="person-avatar">{{ mb_substr($safe->person_name, 0, 1) }}</div>
                                                            <span class="item-person-name">{{ $safe->person_name }}</span>
                                                        </div>
                                                        <div class="item-amount">{{ number_format($safe->amount, 2) }} <span class="amount-currency">USDT</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('safekeeping.delete', $safe->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $safe->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $safe->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('safekeeping.update', $safe->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="text" name="person_name" value="{{ $safe->person_name }}" required class="form-input">
                                                </div>
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $safe->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $safe->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $safe->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Expenses List -->
                    <div x-show="tab === 'expenses'" x-cloak>
                        <div class="two-column-grid">
                            <!-- RUB Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-rub">
                                    <span class="column-currency-icon">₽</span>
                                    <span>الروبل</span>
                                </div>
                                @php $rubExp = $expenses->where('currency', 'RUB'); @endphp
                                @if($rubExp->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($rubExp as $expense)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-amount expense-amount">{{ number_format($expense->amount, 2) }} <span class="amount-currency">₽</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('expense.delete', $expense->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $expense->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $expense->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('expense.update', $expense->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $expense->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $expense->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $expense->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- USDT Column -->
                            <div class="currency-column">
                                <div class="column-header column-header-usdt">
                                    <span class="column-currency-icon">₮</span>
                                    <span>USDT</span>
                                </div>
                                @php $usdtExp = $expenses->where('currency', 'USDT'); @endphp
                                @if($usdtExp->isEmpty())
                                    <div class="list-empty">
                                        <svg class="empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                                        </svg>
                                        <span>لا توجد سجلات</span>
                                    </div>
                                @else
                                    <div class="list-items">
                                        @foreach($usdtExp as $expense)
                                        <div class="item-card" x-data="{ editing: false }">
                                            <div x-show="!editing" class="item-view">
                                                <div class="item-header">
                                                    <div class="item-content">
                                                        <div class="item-amount expense-amount">{{ number_format($expense->amount, 2) }} <span class="amount-currency">USDT</span></div>
                                                    </div>
                                                    <div class="item-actions">
                                                        <button @click="editing = true" class="btn-action btn-action-edit" title="تعديل">
                                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                            </svg>
                                                        </button>
                                                        <form method="POST" action="{{ route('expense.delete', $expense->id) }}" class="inline-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-action btn-action-delete" title="حذف">
                                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                                    <polyline points="3 6 5 6 21 6"/>
                                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="item-datetime">
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                                        </svg>
                                                        {{ $expense->created_at->format('Y/m/d') }}
                                                    </span>
                                                    <span class="datetime-item">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <circle cx="12" cy="12" r="10"/>
                                                            <polyline points="12 6 12 12 16 14"/>
                                                        </svg>
                                                        {{ $expense->created_at->format('H:i') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('expense.update', $expense->id) }}" class="edit-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-wrapper">
                                                    <input type="number" name="amount" step="0.01" value="{{ $expense->amount }}" required class="form-input">
                                                </div>
                                                <div class="select-wrapper">
                                                    <select name="currency" required class="currency-selector">
                                                        <option value="RUB" {{ $expense->currency == 'RUB' ? 'selected' : '' }}>₽ روبل</option>
                                                        <option value="USDT" {{ $expense->currency == 'USDT' ? 'selected' : '' }}>USDT</option>
                                                    </select>
                                                </div>
                                                <div class="edit-actions">
                                                    <button type="submit" class="btn btn-small btn-green">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <polyline points="20 6 9 17 4 12"/>
                                                        </svg>
                                                        حفظ
                                                    </button>
                                                    <button type="button" @click="editing = false" class="btn btn-small btn-gray">
                                                        <svg class="btn-icon-small" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                                        </svg>
                                                        إلغاء
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <!-- Footer -->
            <footer class="app-footer">
                <p>تتبع الديون والمصاريف &copy; {{ date('Y') }}</p>
            </footer>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
            <!-- Register Service Worker -->
        <script>
        if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js')
            .then(reg => console.log('Service Worker registered', reg))
            .catch(err => console.log('Service Worker registration failed', err));
        }
        </script>
</body>
</html>
