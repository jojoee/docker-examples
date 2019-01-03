FROM frolvlad/alpine-python3:latest

COPY ./requirements.txt /app/requirements.txt

WORKDIR /app

RUN pip install -r requirements.txt

COPY . /app

CMD gunicorn --bind 0.0.0.0:5000 wsgi:app
