import type { Metadata } from "next";
import { Inter } from "next/font/google";
import "./globals.css";
import Script from 'next/script'
import Head from "next/head";

const inter = Inter({ subsets: ["latin"] });

export const metadata: Metadata = {
  title: "Laradmin.Next",
  description: "",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
    <Head>
        <meta name="aaa" title="bbb"></meta>
    </Head>
      <body className={inter.className}>
        {children}
      </body>
    </html>
  );
}
