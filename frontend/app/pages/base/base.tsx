"use client";

import FooterNavBar from "~/components/Footer-nav-bar/footer-nav-bar";
import TopNavBar from "~/components/Top-nav-bar/top-nav-bar";

export default function Base({ children }: {children: React.ReactNode}) {
    return (
        <div>
            <TopNavBar/>
            <main className="h-[80vh]">
                {children}
            </main>
            <FooterNavBar/>
        </div>
    );
}