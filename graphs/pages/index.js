import Link from "next/link";
import Layout from "../components/Layout";
import fetch from "isomorphic-unfetch";

const Index = props => (
  <Layout>
    <h2>Homepage</h2>
    <ul>
      {props.metrics.map(metric => {
        return <li key={metric.id}>{metric.name}</li>;
      })}
    </ul>
  </Layout>
);

Index.getInitialProps = async ({ req }) => {
  const res = await fetch("http://127.0.0.1:8000/metrics");
  const json = await res.json();

  return { metrics: json };
};

export default Index;
