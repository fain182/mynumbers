import React, { Component } from "react";

class MetricForm extends Component {
  render() {
    return (
      <div className="row">
        <div className="col-md-6 offset-md-3">
          <form>
            <div className="form-group">
              <label for="name">Name</label>
              <input type="text" className="form-control" id="name" />
            </div>
            <div className="form-group">
              <label for="url">Url</label>
              <input type="text" className="form-control" id="url" />
            </div>
            <div className="form-group">
              <label for="selector">CSS selector</label>
              <input type="text" className="form-control" id="selector" />
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
