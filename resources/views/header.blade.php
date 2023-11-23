<header class="header">
    <div class="header__body">
        <div class="header__content _container">
            <div class="header__contacts contact-header">
                <span class="contact-header__item _icon-location">Toshkent shahri, 100000, Amir Temur ko‘chasi, 62-uy</span>
                <a class="contact-header__item _icon-phone" href="tel:+998712007030">(71) 200-70-30</a>
                <a class="contact-header__item _icon-message" href="mailto:ymmt_idak_mehnat@mail.ru">ymmt_idak_mehnat@mail.ru</a>
            </div>
            <div class="header__bottom">
                <a class="header__logo logo-header" href="index.html">
                    <picture><source srcset="{{asset('/admin-assets/img/header/header-logo.svg')}}" type="image/webp"><img src="{{asset('/admin-assets/img/header/header-logo.svg')}}" alt="Logo"></picture>
                    <h2>
                        <strong>Yagona milliy mehnat tizimi</strong> idoralararo dasturiy-apparat kompleksini boshqarish direksiyasi
                    </h2>
                </a>
                <div class="header__wrap">
                    <nav class="menu-header">
                        <ul class="menu-header__list">
                            @foreach($params as $key => $item)
                            <li class="menu-header__dropdown _icon-arrow-down">
                                <a class="menu-header__link" href="">{{$item['title']['oz']}}</a>
                                <picture><source srcset="{{asset('/admin-assets/img/header/icon-arrow.svg')}}" type="image/webp"><img class="menu-header__icon" src="{{asset('/admin-assets/img/header/icon-arrow.svg')}}" alt="Icon" data-dropdown></picture>
                                @if(count($item->menu) > 0)
                                <ul class="_dropdown">
                                    @foreach($item->menu as $i)
                                    <li><a href="/oz/page/{{$i['id']}}">{{$i['title']['oz']}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <button class="header__burger">
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>
