from flask import Flask, request
from typing import Dict, List, Any
from flask import jsonify

PORT = 5000

# init
app = Flask(__name__)


def res(code: int = 200, message: str = ""):
    obj = {"code": code, "message": message}

    return jsonify(obj)


@app.route("/")
def home():
    return res(message="hi")


@app.errorhandler(404)
def page_not_found(e):
    return res(404)


@app.errorhandler(500)
def internal_error(e):
    return res(500)


# start
if __name__ == "__main__":
    app.run(host="0.0.0.0", port=PORT)
