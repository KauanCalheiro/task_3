<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <h3>Menu</h3>
    </div>
    <ul class="sidebar-menu">
        <!-- <li><a href="">Dashboard</a></li> -->
        <li><a href="/adm/users">Usuários</a></li>
        <li><a href="/adm/users">Eventos</a></li>
        <!-- <li><a href="\">Configurações</a></li> -->
        <li><a href="\">Sair</a></li>
    </ul>
</div>
<style>
    
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    position: fixed;
    height: 100%;
}

.sidebar-header h3 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #ecf0f1;
}

.sidebar-menu {
    list-style-type: none;
    padding-left: 0;
}

.sidebar-menu li {
    margin: 10px 0;
}

.sidebar-menu li a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    display: block;
    padding: 10px;
    border-radius: 4px;
}

.sidebar-menu li a:hover {
    background-color: #34495e;
}

.main-content {
    margin-left: 250px;
    padding: 20px;
    flex: 1;
    background-color: #ecf0f1;
    height: 100vh;
}

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .main-content {
        margin-left: 0;
    }
}
</style>
