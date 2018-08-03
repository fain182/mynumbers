import React, { Component } from "react";
import MetricForm from "./MetricForm";

class App extends Component {
  render() {
    return (
      <div className="container">
        <div className="row">
          <div className="col">
            <nav className="navbar navbar-dark bg-primary">
              <a className="navbar-brand" href="/">
                My numbers
              </a>
            </nav>
          </div>
        </div>
        <MetricForm />
      </div>
    );
  }
}

export default App;
