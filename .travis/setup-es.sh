if [[ -z ${ELASTICSEARCH} ]]; then
    exit 0
fi

docker pull ${ELASTICSEARCH}
docker run -it --name=elasticsearch -e "discovery.type=single-node" -d -p 9200:9200 ${ELASTICSEARCH}
