from flask import Flask, request, jsonify
import controllers.cms as cms

app = Flask(__name__)

@app.route("/")
def telecom_api():
    return "<p> Your Lovely Telecom Company! </p>"

@app.route('/register')
def register():
    name = request.args.get('name')
    email = request.args.get('email')
    mobile = request.args.get('mobile')
    dob = request.args.get('dob')
    aadhar = request.args.get('aadhar')

    result = cms.register_customer(name, email, mobile, dob, aadhar)
    #result = cms.register_customer("Test User", "ab52ac@gmail.com", "9748676655", "01-01-2000", "1234-5678-9012")
    return result

@app.route('/customer')
def get_customer_profile():
    # Using customer id fetch customer profile
    cid = request.args.get('cid')
    result = cms.get_customer_details(cid)
    return jsonify(result)

@app.route('/customer-plan')
def get_customer_plans():
    # Using customer id fetch customer plan
    cid = request.args.get('cid')
    result = cms.get_customer_plan(cid)
    return jsonify(result)

@app.route('/plans')
def get_plans():
    # Fetch all active plans (active by telecom provider, not customer)
    result = cms.get_plans()
    return jsonify(result)

@app.route('/create-plan')
def create_plan():
    # For Admin only for adding new plans
    # name, cost, validity, status
    # 'Platinum365', 499, 365, 1
    # 'Gold180', 299, 180, 1
    # 'Silver90', 199, 90, 1
    name = request.args.get('name')
    cost = request.args.get('cost')
    validity = request.args.get('validity')
    status = request.args.get('status')
    result = cms.create_plan(name, cost, validity, status)
    #result = cms.create_plan('Silver90', 199, 90, 1)
    return result

@app.route('/new-customer-plan')
def new_customer_plan():
    cust_id = request.args.get('cid')
    plan_id = request.args.get('pid')
    result = cms.new_customer_plan(cust_id, plan_id)
    return result

@app.route('/customer-change-plan')
def change_plan():
    cust_id = request.args.get('cid')
    old_plan_id = request.args.get('opid')
    new_plan_id = request.args.get('npid')
    result = cms.customer_change_plan(cust_id, old_plan_id, new_plan_id)
    return result

@app.route('/customer-renew-plan')
def customer_renew_plan():
    cust_id = request.args.get('cid')
    plan_id = request.args.get('pid')
    result = cms.customer_renew_plan(cust_id, plan_id)
    return result
