
from sqlalchemy import MetaData, Column, Table, Integer, VARCHAR, DateTime

md = MetaData()

anonymous_messages = Table(
    'anonymous_messages',
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("text", VARCHAR, nullable=False)
)

guestbook = Table(
    'guestbook',
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("name", VARCHAR, nullable=False),
    Column("text", VARCHAR, nullable=False),
    Column("approved", Integer, nullable=False, server_default="0"),
    Column("created_at", DateTime(), nullable=False, server_default="now()"),
    Column("reply", VARCHAR),
    Column("reply_at", DateTime())
)

videos = Table(
    "videos",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ord", Integer, nullable=False),
    Column("title", VARCHAR, nullable=False),
    Column("url", VARCHAR, nullable=False)
)

buttons = Table(
    "buttons",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("filename", VARCHAR, nullable=False),
    Column("alt", VARCHAR, nullable=False),
    Column("url", VARCHAR)
)

qna = Table(
    "qna",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, server_default="NULL"),
    Column("question", VARCHAR, nullable=False)
)

views = Table(
    "views",
    md,
    Column("date", VARCHAR, primary_key=True),
    Column("views", Integer, nullable=False, server_default="0"),
)

views_expire = Table(
    "views_expire",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("expire", DateTime(), nullable=False, server_default="now()"),
)

project_comments = Table(
    "project_comments",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("project", VARCHAR, nullable=False),
    Column("name", VARCHAR, nullable=False),
    Column("comment", VARCHAR, nullable=False),
    Column("approved", Integer, nullable=False, server_default="0"),
)

project_likes = Table(
    "project_likes",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("project", VARCHAR, nullable=False),
    Column("ip", VARCHAR, nullable=False)
)
