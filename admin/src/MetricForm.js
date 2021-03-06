import React, { Component } from "react";
import { createMetricAPI } from "./api";

class MetricForm extends Component {
  constructor(props) {
    super(props);
    this.nameInput = React.createRef();
    this.urlInput = React.createRef();
    this.selectorInput = React.createRef();

    this.state = { validationError: "", successMessage: "" };
  }

  handleSubmit(event) {
    event.preventDefault();

    createMetricAPI(
      this.nameInput.current.value,
      this.urlInput.current.value,
      this.selectorInput.current.value
    )
      .then(result => {
        this.setState({
          successMessage: "'" + result.name + "' has been added.",
          validationError: ""
        });
      })
      .catch(error => {
        this.setState({ validationError: error.message });
      });
  }

  render() {
    if (this.state.successMessage.length > 0) {
      return (
        <div className="row">
          <div className="col-md-6 offset-md-3">
            <h1>{this.state.successMessage}</h1>
          </div>
        </div>
      );
    }

    return (
      <React.Fragment>
        <div className="row">
          <div className="col-md-6 offset-md-3">
            <form onSubmit={e => this.handleSubmit(e)}>
              <div className="form-group">
                <label htmlFor="name">Name</label>
                <input
                  ref={this.nameInput}
                  type="text"
                  required
                  placeholder="Facebook likes of my page"
                  className="form-control"
                  id="name"
                />
              </div>
              <div className="form-group">
                <label htmlFor="url">Url</label>
                <input
                  ref={this.urlInput}
                  type="text"
                  placeholder="https://www.facebook.com/mypage"
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
                  placeholder="#abc"
                  className="form-control"
                  id="selector"
                />
              </div>
              {this.state.validationError.length > 0 ? (
                <div class="alert alert-danger" role="alert">
                  {this.state.validationError}
                </div>
              ) : null}
              <button type="submit" className="btn btn-primary">
                Track this number!
              </button>
            </form>
          </div>
        </div>
      </React.Fragment>
    );
  }
}

export default MetricForm;
