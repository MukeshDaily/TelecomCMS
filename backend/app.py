from flask import Flask

app = Flask(__name__)

@app.route("/")
def telecom_api():
    return "<p>Your Lovely Telecom Company!</p>"

@app.route('/register')
def register():
    return 'register'

@app.route('/login')
def login():
    return 'login'

@app.route('/new-plan')
def choose_new_plan():
    return 'new plan'

@app.route('/user/<username>')
def display_customer_table(username):
    # show the customer table for that user
    return f'User {escape(username)}'

@app.route('/user/<username>')
def renew_plan(username):
    return f'User {escape(username)}'

@app.route('/user/<username>')
def change_plan(username):
    return f'User {escape(username)}'