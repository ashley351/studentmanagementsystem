<x-app-layout>
    <div style="background:#f1f5f9; min-height:100vh; padding:30px;">

        <div style="max-width:1100px; margin:auto;">

            <h1 style="font-size:28px; font-weight:bold; color:#1e3a8a;">
                Student Management System
            </h1>

            <p style="margin:10px 0 25px; color:#475569;">
                Welcome, {{ Auth::user()->name }}!
                You are logged in as an administrator.
            </p>

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px;">

                <div style="background:white; padding:25px; border-radius:10px;">
                    <h2 style="font-size:20px; font-weight:bold;">Students</h2>
                    <p>Manage student records.</p>
                    <a href="{{ url('/students') }}">View Students</a>
                </div>

                <div style="background:white; padding:25px; border-radius:10px;">
                    <h2 style="font-size:20px; font-weight:bold;">Courses</h2>
                    <p>Manage academic courses.</p>
                    <a href="{{ url('/courses') }}">View Courses</a>
                </div>

                <div style="background:white; padding:25px; border-radius:10px;">
                    <h2 style="font-size:20px; font-weight:bold;">Registrations</h2>
                    <p>View course registrations.</p>
                    <a href="{{ url('/registrations') }}">View Registrations</a>
                </div>

            </div>

            <div style="margin-top:30px; background:white; padding:25px; border-radius:10px;">
                <h2 style="font-size:20px; font-weight:bold;">
                    Administration
                </h2>
                <p style="margin-top:10px;">
                    Use the management sections above to access system records.
                </p>
            </div>

            <p style="text-align:center; margin-top:30px; color:#64748b;">
                Student Management System | MUBS
            </p>

        </div>
    </div>
</x-app-layout> 