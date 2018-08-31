import Link from "next/link";
import Head from "next/head";

const Layout = props => (
  <div>
    <div className="ui inverted vertical masthead center aligned segment">
      <Head>
        <title>Track any number</title>
      </Head>
      <div className="ui text container">
        <Link href="/">
          <h1 className="ui inverted header">Track any number in the web</h1>
        </Link>
        <Link href="/">
          <div className="ui huge primary button">
            Create a graph <i className="right arrow icon" />
          </div>
        </Link>
      </div>
    </div>
    <div className="ui vertical stripe segment">
      <div className="ui middle aligned stackable grid container">
        <div className="row">
          <div className="eight wide column">{props.children}</div>
        </div>
      </div>
    </div>
  </div>
);

export default Layout;
