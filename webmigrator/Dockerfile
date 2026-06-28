FROM python:3.12-alpine

WORKDIR /app

RUN apk add --no-cache postgresql17 postgresql17-dev gcc

RUN pip3 install --upgrade uv

COPY pyproject.toml .

RUN uv sync

COPY alembic/ alembic/.
COPY alembic.ini .
COPY database.py .

ENTRYPOINT ["uv", "run", "alembic", "upgrade", "head"]
