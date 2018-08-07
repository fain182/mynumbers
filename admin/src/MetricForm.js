import React, { Component } from "react";
import { createMetricAPI } from "./api";

class MetricForm extends Component {
  constructor(props) {
    super(props);
    this.nameInput = React.createRef();
    this.urlInput = React.createRef();
    this.selectorInput = React.createRef();

    this.state = { message: "" };
  }

  handleSubmit(event) {
    event.preventDefault();

    createMetricAPI(
      this.nameInput.current.value,
      this.urlInput.current.value,
      this.selectorInput.current.value
    )
      .then(result => {
        this.setState({ message: "'" + result.name + "' has been added." });
      })
      .catch(error => {
        this.setState({ message: error.message });
      });
  }

  render() {
    if (this.state.message.length > 0) {
      return (
        <div className="row">
          <div className="col-md-6 offset-md-3">
            <h1>{this.state.message}</h1>
          </div>
        </div>
      );
    }

    return (
      <div className="row">
        <div className="col-md-6 offset-md-3">
          <form onSubmit={e => this.handleSubmit(e)}>
            <div className="form-group">
              <label htmlFor="name">Name</label>
              <input
                ref={this.nameInput}
                type="text"
                required
                className="form-control"
                id="name"
              />
            </div>
            <div className="form-group">
              <label htmlFor="url">Url</label>
              <input
                ref={this.urlInput}
                type="text"
                required
                className="form-control"
                id="url"
              />
            </div>
            <div className="form-group">
              <label htmlFor="selector">CSS selector</label>
              <input
                ref={this.selectorInput}
                type="text"
                required
                className="form-control"
                id="selector"
              />
            </div>
            <button type="submit" className="btn btn-primary">
              Track this number!
            </button>
          </form>
        </div>
      </div>
    );
  }
}

export default MetricForm;
