import database.db_connect as dc

def get_db():
    cur = dc.get_db().cursor()
    
def query(query, args=(), one=False):
    db = dc.get_db()
    cur = db.execute(query, args)
    rv = cur.fetchall()
    cur.close()
    return (rv[0] if rv else None) if one else rv

def insert(query, args=(), one=False):
    db = dc.get_db()
    cur = db.execute(query, args)
    db.commit()
    cur.close()
    return "Success"

def update(query, args=(), one=False):
    db = dc.get_db()
    cur = db.execute(query, args)
    db.commit()
    cur.close()
    return "Success"