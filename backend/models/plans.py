# Plan creation and editing Not needed
import database.db_adapter as db

def get_plans(status):
    query = "select * from plans where status = ?"
    row = db.query(query, [status])
    return row

def insert_plan(name, cost, validity, status):
    query = "INSERT INTO plans (name, cost, validity, status) VALUES (?, ?, ?, ?)"
    result = db.insert(query, [name, cost, validity, status])
    return result