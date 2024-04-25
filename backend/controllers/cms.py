import models.customers as cust
import models.plans as plans
import models.customer_plans as cplans

def register_customer(name, email, mobile, dob, aadhar):
    try: 
        result = cust.register(name, email, mobile, dob, aadhar)
        return(str(result))
    except Exception as e: 
        return(str(e))

def get_customer_details(cid):
    try: 
        row = cust.get_profile(cid)
        return row
    except Exception as e: 
        return {"error": str(e)}

def get_customer_details_by_email(email):
    try: 
        row = cust.get_profile_by_email(email)
        return row
    except Exception as e: 
        return {"error": str(e)}

def get_customer_plan(cid):
    try: 
        row = cplans.get_plan(cid)
        return row
    except Exception as e: 
        return {"error": str(e)}

# Fetech all active plans
def get_plans(status = 1):
    try: 
        row = plans.get_plans(status)
        return row
    except Exception as e: 
        return {"error": str(e)}

#Admin Create plan
def create_plan(name, cost, validity, status):
    try: 
        result = plans.insert_plan(name, cost, validity, status)
        return(str(result))
    except Exception as e: 
        return {"error": str(e)}

def new_customer_plan(cust_id, plan_id):
    try: 
        result = cplans.create_plan(cust_id, plan_id)
        return(str(result))
    except Exception as e: 
        return {"error": str(e)}

def customer_change_plan(cust_id, old_plan_id, new_plan_id):
    try: 
        result = cplans.change_plan(cust_id, old_plan_id, new_plan_id)
        return(str(result))
    except Exception as e: 
        return {"error": str(e)}

def customer_renew_plan(cust_id, plan_id):
    try: 
        result = cplans.renew_plan(cust_id, plan_id, status=1)
        return(str(result))
    except Exception as e: 
        return {"error": str(e)}