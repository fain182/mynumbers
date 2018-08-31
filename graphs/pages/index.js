import Link from "next/link";
import Layout from "../components/Layout";
import fetch from "isomorphic-unfetch";
import "semantic-ui-css/semantic.min.css";
import { Modal, Header, Button, List, Icon } from "semantic-ui-react";

const Index = props => (
  <Layout>
    <h3 className="ui header">Homepage</h3>
    <div className="ui inverted segment">
      <div className="ui inverted relaxed divided list">
        {props.metrics.map(metric => {
          return (
            <div className="item" key={metric.id}>
              <div className="content">
                <div className="header">{metric.name}</div>
                from {metric.url}
              </div>
            </div>
          );
        })}
      </div>
    </div>
  </Layout>
);

Index.getInitialProps = async ({ req }) => {
  const res = await fetch("http://127.0.0.1:8000/metrics");
  const json = await res.json();

  return { metrics: json };
};

export default Index;
