<x-layouts.base>


    @if(in_array(request()->route()->getName(), ['dashboard', 'courrier-user','profile','notification','profile-example', 'users', 'bootstrap-tables', 'transactions','post-add',

    'buttons','forms', 'paramettre','courrier-create','courrier-index','modiffier-pwd','courrier-edit','courrier-show','emeteur-list','emeteur-edit','emeteur-index','emplacement-list','emplacement-index','emplacement-show','emplacement-edit','envoi-mail','modals', 'notifications', 'typography', 'upgrade-to-pro', 'index','live-table','users-edit','UsersEdit' ,'post','view-details','post-edit','post-edit-edit','historiques']))



    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer')

    </main>

    @elseif(in_array(request()->route()->getName(), ['register', 'register-example', 'login', 'login-example',
    'forgot-password', 'forgot-password-example', 'reset-password','reset-password-example']))

    {{ $slot }}
    {{-- Footer --}}
    @include('layouts.footer2')
    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

    {{ $slot }}

    @endif
</x-layouts.base>
