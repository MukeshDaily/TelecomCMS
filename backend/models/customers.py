import database.db_adapter as db

def register(name, email, mobile, dob, aadhar):
    query = "INSERT INTO customers (name, email, mobile, dob, aadhar) VALUES (?, ?, ?, ?, ?)"
    result = db.insert(query, [name, email, mobile, dob, aadhar])
    return result

def login(username):
    query = "select * from customers where username = ?"
    row = db.query(query, [username], one=True)
    return row

def get_profile(cid):
    query = "select * from customers where id = ?"
    row = db.query(query, [cid], one=True)
    return row

def get_profile_by_email(email):
    query = "select * from customers where email = ?"
    row = db.query(query, [email], one=True)
    return row