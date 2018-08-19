import Link from "next/link";
import Typography from "typography";
import theme from "typography-theme-alton";
import Head from "next/head";
import { TypographyStyle, GoogleFont } from "react-typography";

const typography = new Typography(theme);

const Layout = props => (
  <div style={{ width: "800px", margin: "0 auto" }}>
    <Head>
      <title>Track any number</title>
      <TypographyStyle typography={typography} />
      <GoogleFont typography={typography} />
    </Head>
    <div>
      <Link href="/">
        <h1>Track any number on the web</h1>
      </Link>
      <div>{props.children}</div>
    </div>
  </div>
);

export default Layout;
