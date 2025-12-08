import '../../css/sidebar.css';
import { router, usePage } from '@inertiajs/react'
import LogoSeprev from '../Assets/logo-seprev';
import NavIcon from '../Assets/Icons/NavIcon';
import LogoutIcon from '../Assets/Icons/Logout';
import LogoSumese, { IconSumese } from '../Assets/logo-sumese';
import MenuIcon from '../Assets/Icons/MenuIcon';
import { useEffect, useState, useRef } from 'react';

function SidebarLink({ href, icon, label }) {
    const isActive = window.location.pathname === href;
    return (
        <li>
            <a href={href} className={`nav-link ${isActive ? "current" : ""}`} title={label}>
                <div className="nav-link-icon"><NavIcon icon={icon} fill={isActive ? true : false} /></div>
                <div className="nav-link-label">{label}</div>
            </a>
        </li>
    );
}

export default function Sidebar() {
    const { auth } = usePage().props;
    const [compact, setCompact] = useState(() => {
        if (typeof window !== "undefined") {
            return localStorage.getItem("sidebarCompact") === "true";
        }
        return false;
    });
    const sidebarRef = useRef(null);

    useEffect(() => {
        const saved = localStorage.getItem("sidebarCompact") === "true";
        setCompact(saved);
    }, []);

    const toggleSidebar = () => {
        setCompact((prev) => {
            const next = !prev;
            localStorage.setItem("sidebarCompact", next);
            return next;
        });
    };

    const handleLogout = () => {
        router.post(route('logout'));
    };

    return (
        <nav
            id="sidebar"
            ref={sidebarRef}
            className={compact ? "compact" : ""}
        >
            <button
                className="sidebar-switch-button"
                onClick={toggleSidebar}
            >
                <MenuIcon />
            </button>
            <div className="top-section">
                <a href='/' className="title">
                    <div className="logo"><LogoSumese /></div>
                    <div className="icone"><IconSumese /></div>
                    <div className="subtitle">Superintendência de Medidas Socioeducativas</div>
                </a>
                <div className='divisor'></div>
                <ul className="nav-links">
                    <SidebarLink href="/" icon="home" label="Início" />
                    <SidebarLink href="/socioeducandos" icon="socioeducandos" label="Socioeducandos" />
                    <SidebarLink href="/unidades" icon="unidades" label="Unidades" />
                    <SidebarLink href="/users" icon="users" label="Usuários" />
                </ul>
            </div>
            <div className="bottom-section">
                <button onClick={handleLogout} className="logout-button">
                    <span>{auth.user.name}</span>
                    <div className="logout-icon" title='Sair'><LogoutIcon fill={false} /></div>
                </button>
                <div className="logo-seprev">
                    <LogoSeprev />
                </div>
            </div>
        </nav>
    );
}
