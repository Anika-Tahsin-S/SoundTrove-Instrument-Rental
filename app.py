from flask import Flask, render_template, flash
from flask_wtf import FlaskForm
from wtforms import StringField, SubmitField
from wtforms.validators import DataRequired
from flask_sqlalchemy import SQLAlchemy
# from flask_mysqldb import MySQL
from datetime import datetime


## Flask Instance ----------------------------------------------
app = Flask(__name__) # find all files

## Database MySQL----------------------------------------------
# Database
# app.config['MYSQL_USER'] = 'rentalusers'
# #app.config['MYSQL_PASSWORD'] = os.getenv('MYSQL_PASSWORD')
# app.config['MYSQL_PASSWORD'] = '1234'
# app.config['MYSQL_DB'] = 'rentalusers'
# app.config['MYSQL_CURSORCLASS'] = 'Cursor'
# app.config['JSON_SORT_KEYS'] = False
# app.config['SQLALCHEMY_DATABASE'] = 'rentalusers'


app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:1234@localhost/rentalusers'
# app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

## SECRET KEY ----------------------------------------------
app.config['SECRET_KEY'] = "urgh! gotta define it" # Only for me

## Initialize Database
db = SQLAlchemy(app)
# db.app_context().push()
# mysql = MySQL(app)

## Define Model ----------------------------------------------
class Users(db.Model):
    id = db.Column(db.Integer, primary_key = True)
    name = db.Column(db.String(200), nullable = False)
    email = db.Column(db.String(120), nullable = False, unique = True)
    date_joined = db.Column(db.DateTime, default=datetime.utcnow)

    # Creat string
    def __repr__(self):
        return '<Name %r>' % self.name

## Form Class ----------------------------------------------
class Form(FlaskForm):
    name = StringField("Name: ", validators=[DataRequired()])
    email = StringField("Email: ", validators=[DataRequired()])
    submit = SubmitField("Submit")

## ADD User ----------------------------------------------
@app.route('/user/add', methods=['GET', 'POST'])
def add_user():
    name = None
    form = Form()
    if form.validate_on_submit():
        user = Users.query.filter_by(email=form.email.data).first()
        if user in None:
            user = Users(name=form.name.data, email=form.email.data)
            db.session.add(user)
            db.session.commit()
        name = form.name.data
        form.name.data = ''
        form.email.data = ''
        flash("New User Added Successfully!!")
    here_users = Users.query.order_by(Users.date_joined)
    return render_template("05.add_user.html", form=form, name=name, here_users=here_users)


## Creating route (url) decorator ----------------------------------------------
@app.route('/') # root route, main

def index():
    name_test = "Bleh"
    shop = ['coffee', 'fried chicken', 'momo']
    return render_template("01.index.html", name_test=name_test, shopping = shop)

# if __name__ == '__main__': app.run(debug=True)

@app.route('/user/<name>')
def user(name):
    # return "<h1>yea got it {}</h1>".format(name)
    return render_template("02.user.html", name = name)


## Name/Register Pages ----------------------------------------------
@app.route('/name', methods=['GET', 'POST'])
def name():
    name = None
    form = Form()
    # validate
    if form.validate_on_submit():
        name = form.name.data
        form.name.data = ''
        flash("Form Submitted Successfully!!")

    return render_template("04.register.html", name = name, form = form)


## Customer Error Pages ----------------------------------------------
# Invalid URL
@app.errorhandler(404)
def page_not_found(err):
    return render_template('404.html'), 404

# Internal Server Error
@app.errorhandler(500)
def page_not_found(err):
    return render_template('500.html'), 500