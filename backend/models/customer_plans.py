import database.db_adapter as db

def get_plan(cid):
    query = "select * from customer_plans where cust_id = ?"
    row = db.query(query, [cid], one=True)
    return row

def create_plan(cust_id, plan_id, status=0):
    query = "INSERT INTO customer_plans (cust_id, plan_id, status) VALUES (?, ?, ?)"
    result = db.insert(query, [cust_id, plan_id, status])
    return result

def change_plan(cust_id, old_plan_id, new_plan_id):
    query = "UPDATE customer_plans SET plan_id=?, status=? WHERE cust_id= ? AND plan_id= ?"
    result = db.update(query, [new_plan_id, 0, cust_id, old_plan_id])
    return result

def renew_plan(cust_id, plan_id, status):
    query = "UPDATE customer_plans SET status=? where cust_id= ? and plan_id=?"
    result = db.update(query, [status, cust_id, plan_id])
    return result