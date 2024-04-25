from flask import Flask, request, jsonify
import controllers.cms as cms

app = Flask(__name__)

@app.route("/")
def telecom_api():
    return "<p> Your Lovely Telecom Company! </p>"

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    name = req_data.get('name')
    email = req_data.get('email')
    mobile = req_data.get('mobile')
    dob = req_data.get('dob')
    aadhar = req_data.get('aadhar')

    result = cms.register_customer(name, email, mobile, dob, aadhar)
    #result = cms.register_customer("Test User", "ab52ac@gmail.com", "9748676655", "01-01-2000", "1234-5678-9012")
    return result

@app.route('/customer', methods=['GET', 'POST'])
def get_customer_profile():
    # Using customer id fetch customer profile
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    cid = req_data.get('cid')
    result = cms.get_customer_details(cid)
    return jsonify(result)

@app.route('/customer-by-email', methods=['GET', 'POST'])
def get_customer_profile_by_email():
    # Using customer id fetch customer profile
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    email = req_data.get('email')
    result = cms.get_customer_details_by_email(email)
    return jsonify(result)

@app.route('/customer-plan', methods=['GET', 'POST'])
def get_customer_plans():
    # Using customer id fetch customer plan
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    cid = req_data.get('cid')
    result = cms.get_customer_plan(cid)
    return jsonify(result)

@app.route('/plans', methods=['GET', 'POST'])
def get_plans():
    # Fetch all active plans (active by telecom provider, not customer)
    result = cms.get_plans()
    return jsonify(result)

@app.route('/create-plan', methods=['GET', 'POST'])
def create_plan():
    # For Admin only for adding new plans
    # name, cost, validity, status
    # 'Platinum365', 499, 365, 1
    # 'Gold180', 299, 180, 1
    # 'Silver90', 199, 90, 1
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    name = req_data.get('name')
    cost = req_data.get('cost')
    validity = req_data.get('validity')
    status = req_data.get('status')
    result = cms.create_plan(name, cost, validity, status)
    #result = cms.create_plan('Silver90', 199, 90, 1)
    return result

@app.route('/new-customer-plan', methods=['GET', 'POST'])
def new_customer_plan():
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    cust_id = req_data.get('cid')
    plan_id = req_data.get('pid')
    result = cms.new_customer_plan(cust_id, plan_id)
    return result

@app.route('/customer-change-plan', methods=['GET', 'POST'])
def change_plan():
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    cust_id = req_data.get('cid')
    old_plan_id = req_data.get('opid')
    new_plan_id = req_data.get('npid')
    result = cms.customer_change_plan(cust_id, old_plan_id, new_plan_id)
    return result

@app.route('/customer-renew-plan', methods=['GET', 'POST'])
def customer_renew_plan():
    if request.method == "POST":
        req_data= request.json
    else: 
        req_data = request.args
    cust_id = req_data.get('cid')
    plan_id = req_data.get('pid')
    result = cms.customer_renew_plan(cust_id, plan_id)
    return result
