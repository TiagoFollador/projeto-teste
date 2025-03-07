"use client";

import FooterNavBar from "~/components/footer-nav-bar";
import TopNavBar from "~/components/top-nav-bar";

export default function Base({ children }: {children: React.ReactNode}) {
    return (
        <div>
            <TopNavBar/>
            <main>
                {children}
            </main>
            <FooterNavBar/>
        </div>
    );
}