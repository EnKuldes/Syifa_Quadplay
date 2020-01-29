<div class="page-sidebar sidebar horizontal-bar">
{{-- <div class="page-sidebar sidebar vertical-bar"> --}}
    <div class="page-sidebar-inner">
        <ul class="menu accordion-menu">
            <li class="nav-heading"><span>Navigation</span></li>
            
            {{-- Consumed dan Follop Up hanya Agent --}}
            @if (Auth::User()->divisi == 'Agent')
            <li><a href="/agent/workspace"><span class="menu-icon icon-speedometer"></span><p>Workspace</p></a></li>
            <li><a href="/agent/consume/all"><span class="menu-icon icon-user"></span><p>Consumed</p></a></li>
            @endif

            {{-- Consumed dan Return hanya QCO --}}
            @if (Auth::User()->divisi == 'QCO')
            <li><a href="/tapping/workspace"><span class="menu-icon icon-speedometer"></span><p>Workspace</p></a></li>
            <li><a href="/tapping/consume/all"><span class="menu-icon icon-user"></span><p>Consumed</p></a></li>
            @endif

            {{-- Navbar Admin --}}
            @if (Auth::User()->divisi == 'Admin')
            <li><a href="/admin"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
            <li><a href="/admin/report"><span class="menu-icon icon-user"></span><p>Report</p></a></li>
            @endif

            {{--
            <li class="droplink"><a href="#"><span class="menu-icon icon-envelope-open"></span><p>Mailbox</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="message-view.html">View Message</a></li>
                    <li><a href="compose.html">Compose</a></li>
                </ul>
            </li> 

            <li class="nav-heading"><span>Features</span></li>
            <li class="droplink"><a href="#"><span class="menu-icon icon-briefcase"></span><p>UI Kits</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="ui-alerts.html">Alerts</a></li>
                    <li><a href="ui-buttons.html">Buttons</a></li>
                    <li><a href="ui-icons.html">Icons</a></li>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-notifications.html">Notifications</a></li>
                    <li><a href="ui-grid.html">Grid</a></li>
                    <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                    <li><a href="ui-modals.html">Modals</a></li>
                    <li><a href="ui-panels.html">Panels</a></li>
                    <li><a href="ui-progress.html">Progress Bars</a></li>
                    <li><a href="ui-sliders.html">Sliders</a></li>
                    <li><a href="ui-nestable.html">Nestable</a></li>
                    <li><a href="ui-tree-view.html">Tree View</a></li>
                </ul>
            </li>
            --}}
        </ul>
    </div>
    {{-- Page Sidebar Inner --}}
</div>
@if ($datas ?? '')
    @if ($datas['dev_message'])
        @include('inc.message')
    @endif
    
@endif
