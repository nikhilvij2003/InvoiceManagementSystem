<header style="
    background: linear-gradient(to right, #4f46e5, #a78bfa);
    color: white;
    padding: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    ">
        <h1 style="
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        "><a href="/welcome">
                Shri Sachidanand Traders
</a>
        </h1>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button 
                type="submit" 
                style="
                    background-color: #60a5fa;
                    color: white;
                    padding: 0.25rem 0.75rem;
                    border-radius: 0.375rem;
                    transition: background-color 0.3s;
                    margin-left: 1rem;
                "
                onmouseover="this.style.backgroundColor='#2563eb'"
                onmouseout="this.style.backgroundColor='#60a5fa'"
            >
                Logout
            </button>
        </form>
    </div>
</header>
